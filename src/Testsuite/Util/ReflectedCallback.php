<?php declare(strict_types=1);
namespace EasyAccept\Testsuite\Util;

/**
 * Callback Decorator
 * 
 * Providing reflection and invoking 
 * with named function arguments.
 *
 * @version 0.0.1
 * @see http://stackoverflow.com/q/8649536/367456
 * @author hakre <http:://hakre.wordpress.com/>
 */
class ReflectedCallback
{
	private $callback;
	private $class;
	private $name;
	public function __construct($callback)
	{
		$this->setCallback($callback);
	}
	private function setCallback($callback)
	{
		if (!is_callable($callback, TRUE, $callable))
		{
			throw new \InvalidArgumentException('Invalid callback.');
		}
		$this->callback = $callback;
		list($this->name, $this->class) = array_reverse(explode('::', $callable, 2)) + array(1 => null);
	}
	public function getCallableName()
	{
		$callable = $this->name;
		if ($this->class) $callable = $this->class . '::' . $callable;
		return $callable;
	}
	/**
	 * original callback
	 *
	 * @return callback
	 */
	public function getCallback()
	{
		return $this->callback;
	}
	/**
	 * @return object|null object of the callback function, NULL for static and global functions
	 */
	public function getObject()
	{
		$callback = $this->callback;

		if (is_object($callback))
			return $callback;

		if (is_array($callback) && is_object($callback[0]))
			return $callback[0];
	}
	/**
	 * @return \ReflectionFunctionAbstract
	 * @throws \ReflectionException
	 */	
	public function getReflectionFunction(): \ReflectionFunctionAbstract
	{
		if ($object = $this->getObject())
		{
			return new \ReflectionMethod($object, $this->name);
		}
		if ($this->class)
		{
			return new \ReflectionMethod($this->class, $this->name);
		}
		
		return new \ReflectionFunction($this->name);
	}
	/**
	 * @return mixed
	 * @throws \ReflectionException
	 */
	public function invokeArgs($args): mixed
	{
		$args = $this->arrangeByParameterNames($args, $this->getReflectionFunction());

		return call_user_func_array($this->callback, $args);
	}
	/**
	 * @return array
	 */
	private function arrangeByParameterNames(Array $args, \ReflectionFunctionAbstract $function): array
	{
		if (!$args) return $args;

		$parameters = $function->getParameters();

		foreach($parameters as $index => $param) 
		{
			if (isset($args[$param->name]))
			{
				$parameters[$index] = &$args[$param->name];
			}
			else if (isset($args[$index]))
			{
				$parameters[$index] = &$args[$index];
			}
			else
			{
				try
				{
					$parameters[$index] = $param->getDefaultValue();
				} catch(\ReflectionException $e) {
					throw new \ReflectionException(sprintf("Parameter $%s (#%d) is not optional for callback %s", $param->name, $index+1, $this->getCallableName()), $e->getCode());
				}
			}
		}
		return $parameters;
	}
}