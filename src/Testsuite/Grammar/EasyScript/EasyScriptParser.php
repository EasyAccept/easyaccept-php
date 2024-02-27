<?php

/*
 * Generated from src/Testsuite/Grammar/EasyScript.g4 by ANTLR 4.13.1
 */

namespace EasyAccept\Testsuite\Grammar\EasyScript {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class EasyScriptParser extends Parser
	{
		public const ASSIGN = 1, ECHO_ = 2, QUIT_ = 3, STRING = 4, WORD = 5, ENDLINE = 6, 
               NEWLINE = 7, SPACE = 8, COMMENT = 9;

		public const RULE_easy = 0, RULE_instruction = 1, RULE_command = 2, RULE_echo_ = 3, 
               RULE_quit_ = 4, RULE_unknownCommand = 5, RULE_argumentList = 6, 
               RULE_argument = 7;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'easy', 'instruction', 'command', 'echo_', 'quit_', 'unknownCommand', 
			'argumentList', 'argument'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'='", "'echo'", "'quit'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "ASSIGN", "ECHO_", "QUIT_", "STRING", "WORD", "ENDLINE", "NEWLINE", 
		    "SPACE", "COMMENT"
		];

		private const SERIALIZED_ATN =
			[4, 1, 9, 81, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 7, 
		    4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 1, 0, 5, 0, 18, 8, 0, 10, 0, 
		    12, 0, 21, 9, 0, 1, 0, 3, 0, 24, 8, 0, 1, 0, 5, 0, 27, 8, 0, 10, 0, 
		    12, 0, 30, 9, 0, 1, 0, 1, 0, 1, 1, 5, 1, 35, 8, 1, 10, 1, 12, 1, 38, 
		    9, 1, 1, 1, 1, 1, 4, 1, 42, 8, 1, 11, 1, 12, 1, 43, 1, 1, 3, 1, 47, 
		    8, 1, 1, 2, 1, 2, 1, 2, 3, 2, 52, 8, 2, 1, 3, 1, 3, 3, 3, 56, 8, 3, 
		    1, 4, 1, 4, 1, 5, 1, 5, 3, 5, 62, 8, 5, 1, 6, 4, 6, 65, 8, 6, 11, 
		    6, 12, 6, 66, 1, 6, 1, 6, 3, 6, 71, 8, 6, 1, 7, 1, 7, 1, 7, 1, 7, 
		    3, 7, 77, 8, 7, 3, 7, 79, 8, 7, 1, 7, 0, 0, 8, 0, 2, 4, 6, 8, 10, 
		    12, 14, 0, 1, 1, 0, 4, 5, 86, 0, 19, 1, 0, 0, 0, 2, 36, 1, 0, 0, 0, 
		    4, 51, 1, 0, 0, 0, 6, 53, 1, 0, 0, 0, 8, 57, 1, 0, 0, 0, 10, 59, 1, 
		    0, 0, 0, 12, 64, 1, 0, 0, 0, 14, 78, 1, 0, 0, 0, 16, 18, 5, 6, 0, 
		    0, 17, 16, 1, 0, 0, 0, 18, 21, 1, 0, 0, 0, 19, 17, 1, 0, 0, 0, 19, 
		    20, 1, 0, 0, 0, 20, 23, 1, 0, 0, 0, 21, 19, 1, 0, 0, 0, 22, 24, 3, 
		    2, 1, 0, 23, 22, 1, 0, 0, 0, 23, 24, 1, 0, 0, 0, 24, 28, 1, 0, 0, 
		    0, 25, 27, 5, 6, 0, 0, 26, 25, 1, 0, 0, 0, 27, 30, 1, 0, 0, 0, 28, 
		    26, 1, 0, 0, 0, 28, 29, 1, 0, 0, 0, 29, 31, 1, 0, 0, 0, 30, 28, 1, 
		    0, 0, 0, 31, 32, 5, 0, 0, 1, 32, 1, 1, 0, 0, 0, 33, 35, 5, 8, 0, 0, 
		    34, 33, 1, 0, 0, 0, 35, 38, 1, 0, 0, 0, 36, 34, 1, 0, 0, 0, 36, 37, 
		    1, 0, 0, 0, 37, 39, 1, 0, 0, 0, 38, 36, 1, 0, 0, 0, 39, 46, 3, 4, 
		    2, 0, 40, 42, 5, 6, 0, 0, 41, 40, 1, 0, 0, 0, 42, 43, 1, 0, 0, 0, 
		    43, 41, 1, 0, 0, 0, 43, 44, 1, 0, 0, 0, 44, 45, 1, 0, 0, 0, 45, 47, 
		    3, 2, 1, 0, 46, 41, 1, 0, 0, 0, 46, 47, 1, 0, 0, 0, 47, 3, 1, 0, 0, 
		    0, 48, 52, 3, 6, 3, 0, 49, 52, 3, 8, 4, 0, 50, 52, 3, 10, 5, 0, 51, 
		    48, 1, 0, 0, 0, 51, 49, 1, 0, 0, 0, 51, 50, 1, 0, 0, 0, 52, 5, 1, 
		    0, 0, 0, 53, 55, 5, 2, 0, 0, 54, 56, 3, 12, 6, 0, 55, 54, 1, 0, 0, 
		    0, 55, 56, 1, 0, 0, 0, 56, 7, 1, 0, 0, 0, 57, 58, 5, 3, 0, 0, 58, 
		    9, 1, 0, 0, 0, 59, 61, 5, 5, 0, 0, 60, 62, 3, 12, 6, 0, 61, 60, 1, 
		    0, 0, 0, 61, 62, 1, 0, 0, 0, 62, 11, 1, 0, 0, 0, 63, 65, 5, 8, 0, 
		    0, 64, 63, 1, 0, 0, 0, 65, 66, 1, 0, 0, 0, 66, 64, 1, 0, 0, 0, 66, 
		    67, 1, 0, 0, 0, 67, 68, 1, 0, 0, 0, 68, 70, 3, 14, 7, 0, 69, 71, 3, 
		    12, 6, 0, 70, 69, 1, 0, 0, 0, 70, 71, 1, 0, 0, 0, 71, 13, 1, 0, 0, 
		    0, 72, 79, 5, 4, 0, 0, 73, 76, 5, 5, 0, 0, 74, 75, 5, 1, 0, 0, 75, 
		    77, 7, 0, 0, 0, 76, 74, 1, 0, 0, 0, 76, 77, 1, 0, 0, 0, 77, 79, 1, 
		    0, 0, 0, 78, 72, 1, 0, 0, 0, 78, 73, 1, 0, 0, 0, 79, 15, 1, 0, 0, 
		    0, 13, 19, 23, 28, 36, 43, 46, 51, 55, 61, 66, 70, 76, 78];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "EasyScript.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function easy(): Context\EasyContext
		{
		    $localContext = new Context\EasyContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_easy);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(19);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(16);
		        		$this->match(self::ENDLINE); 
		        	}

		        	$this->setState(21);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx);
		        }
		        $this->setState(23);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 300) !== 0)) {
		        	$this->setState(22);
		        	$this->instruction();
		        }
		        $this->setState(28);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::ENDLINE) {
		        	$this->setState(25);
		        	$this->match(self::ENDLINE);
		        	$this->setState(30);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(31);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function instruction(): Context\InstructionContext
		{
		    $localContext = new Context\InstructionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_instruction);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(36);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::SPACE) {
		        	$this->setState(33);
		        	$this->match(self::SPACE);
		        	$this->setState(38);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(39);
		        $this->command();
		        $this->setState(46);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx)) {
		            case 1:
		        	    $this->setState(41); 
		        	    $this->errorHandler->sync($this);

		        	    $_la = $this->input->LA(1);
		        	    do {
		        	    	$this->setState(40);
		        	    	$this->match(self::ENDLINE);
		        	    	$this->setState(43); 
		        	    	$this->errorHandler->sync($this);
		        	    	$_la = $this->input->LA(1);
		        	    } while ($_la === self::ENDLINE);
		        	    $this->setState(45);
		        	    $this->instruction();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function command(): Context\CommandContext
		{
		    $localContext = new Context\CommandContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_command);

		    try {
		        $this->setState(51);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::ECHO_:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(48);
		            	$this->echo_();
		            	break;

		            case self::QUIT_:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(49);
		            	$this->quit_();
		            	break;

		            case self::WORD:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(50);
		            	$this->unknownCommand();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function echo_(): Context\Echo_Context
		{
		    $localContext = new Context\Echo_Context($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_echo_);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(53);
		        $this->match(self::ECHO_);
		        $this->setState(55);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SPACE) {
		        	$this->setState(54);
		        	$this->argumentList();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function quit_(): Context\Quit_Context
		{
		    $localContext = new Context\Quit_Context($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_quit_);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(57);
		        $this->match(self::QUIT_);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function unknownCommand(): Context\UnknownCommandContext
		{
		    $localContext = new Context\UnknownCommandContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_unknownCommand);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(59);
		        $this->match(self::WORD);
		        $this->setState(61);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SPACE) {
		        	$this->setState(60);
		        	$this->argumentList();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argumentList(): Context\ArgumentListContext
		{
		    $localContext = new Context\ArgumentListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_argumentList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(64); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(63);
		        	$this->match(self::SPACE);
		        	$this->setState(66); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::SPACE);
		        $this->setState(68);
		        $this->argument();
		        $this->setState(70);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SPACE) {
		        	$this->setState(69);
		        	$this->argumentList();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argument(): Context\ArgumentContext
		{
		    $localContext = new Context\ArgumentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_argument);

		    try {
		        $this->setState(78);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::STRING:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(72);
		            	$this->match(self::STRING);
		            	break;

		            case self::WORD:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(73);
		            	$this->match(self::WORD);
		            	$this->setState(76);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::ASSIGN) {
		            		$this->setState(74);
		            		$this->match(self::ASSIGN);
		            		$this->setState(75);

		            		$_la = $this->input->LA(1);

		            		if (!($_la === self::STRING || $_la === self::WORD)) {
		            		$this->errorHandler->recoverInline($this);
		            		} else {
		            			if ($this->input->LA(1) === Token::EOF) {
		            			    $this->matchedEOF = true;
		            		    }

		            			$this->errorHandler->reportMatch($this);
		            			$this->consume();
		            		}
		            	}
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}
	}
}

namespace EasyAccept\Testsuite\Grammar\EasyScript\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use EasyAccept\Testsuite\Grammar\EasyScript\EasyScriptParser;
	use EasyAccept\Testsuite\Grammar\EasyScript\EasyScriptVisitor;

	class EasyContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_easy;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(EasyScriptParser::EOF, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ENDLINE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(EasyScriptParser::ENDLINE);
	    	}

	        return $this->getToken(EasyScriptParser::ENDLINE, $index);
	    }

	    public function instruction(): ?InstructionContext
	    {
	    	return $this->getTypedRuleContext(InstructionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitEasy($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class InstructionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_instruction;
	    }

	    public function command(): ?CommandContext
	    {
	    	return $this->getTypedRuleContext(CommandContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SPACE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(EasyScriptParser::SPACE);
	    	}

	        return $this->getToken(EasyScriptParser::SPACE, $index);
	    }

	    public function instruction(): ?InstructionContext
	    {
	    	return $this->getTypedRuleContext(InstructionContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ENDLINE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(EasyScriptParser::ENDLINE);
	    	}

	        return $this->getToken(EasyScriptParser::ENDLINE, $index);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitInstruction($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CommandContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_command;
	    }

	    public function echo_(): ?Echo_Context
	    {
	    	return $this->getTypedRuleContext(Echo_Context::class, 0);
	    }

	    public function quit_(): ?Quit_Context
	    {
	    	return $this->getTypedRuleContext(Quit_Context::class, 0);
	    }

	    public function unknownCommand(): ?UnknownCommandContext
	    {
	    	return $this->getTypedRuleContext(UnknownCommandContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitCommand($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Echo_Context extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_echo_;
	    }

	    public function ECHO_(): ?TerminalNode
	    {
	        return $this->getToken(EasyScriptParser::ECHO_, 0);
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitEcho_($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Quit_Context extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_quit_;
	    }

	    public function QUIT_(): ?TerminalNode
	    {
	        return $this->getToken(EasyScriptParser::QUIT_, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitQuit_($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class UnknownCommandContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_unknownCommand;
	    }

	    public function WORD(): ?TerminalNode
	    {
	        return $this->getToken(EasyScriptParser::WORD, 0);
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitUnknownCommand($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgumentListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_argumentList;
	    }

	    public function argument(): ?ArgumentContext
	    {
	    	return $this->getTypedRuleContext(ArgumentContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SPACE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(EasyScriptParser::SPACE);
	    	}

	        return $this->getToken(EasyScriptParser::SPACE, $index);
	    }

	    public function argumentList(): ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitArgumentList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgumentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return EasyScriptParser::RULE_argument;
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(EasyScriptParser::STRING, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function WORD(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(EasyScriptParser::WORD);
	    	}

	        return $this->getToken(EasyScriptParser::WORD, $index);
	    }

	    public function ASSIGN(): ?TerminalNode
	    {
	        return $this->getToken(EasyScriptParser::ASSIGN, 0);
	    }

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof EasyScriptVisitor) {
			    return $visitor->visitArgument($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}