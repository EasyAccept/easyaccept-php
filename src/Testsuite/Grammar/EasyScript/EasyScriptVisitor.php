<?php

/*
 * Generated from src/Testsuite/Grammar/EasyScript.g4 by ANTLR 4.13.1
 */

namespace EasyAccept\Testsuite\Grammar\EasyScript;

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see EasyScriptParser}.
 */
interface EasyScriptVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::easy()}.
	 *
	 * @param Context\EasyContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEasy(Context\EasyContext $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::instruction()}.
	 *
	 * @param Context\InstructionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitInstruction(Context\InstructionContext $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::command()}.
	 *
	 * @param Context\CommandContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCommand(Context\CommandContext $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::echo_()}.
	 *
	 * @param Context\Echo_Context $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEcho_(Context\Echo_Context $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::quit_()}.
	 *
	 * @param Context\Quit_Context $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitQuit_(Context\Quit_Context $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::unknownCommand()}.
	 *
	 * @param Context\UnknownCommandContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnknownCommand(Context\UnknownCommandContext $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::argumentList()}.
	 *
	 * @param Context\ArgumentListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgumentList(Context\ArgumentListContext $context);

	/**
	 * Visit a parse tree produced by {@see EasyScriptParser::argument()}.
	 *
	 * @param Context\ArgumentContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgument(Context\ArgumentContext $context);
}