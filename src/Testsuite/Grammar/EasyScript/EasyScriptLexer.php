<?php

/*
 * Generated from src/Testsuite/Grammar/EasyScript.g4 by ANTLR 4.13.1
 */

namespace EasyAccept\Testsuite\Grammar\EasyScript {
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\LexerATNSimulator;
	use Antlr\Antlr4\Runtime\Lexer;
	use Antlr\Antlr4\Runtime\CharStream;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\VocabularyImpl;

	final class EasyScriptLexer extends Lexer
	{
		public const ASSIGN = 1, ECHO_ = 2, QUIT_ = 3, STRING = 4, WORD = 5, ENDLINE = 6, 
               NEWLINE = 7, SPACE = 8, COMMENT = 9;

		/**
		 * @var array<string>
		 */
		public const CHANNEL_NAMES = [
			'DEFAULT_TOKEN_CHANNEL', 'HIDDEN'
		];

		/**
		 * @var array<string>
		 */
		public const MODE_NAMES = [
			'DEFAULT_MODE'
		];

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'ASSIGN', 'ECHO_', 'QUIT_', 'STRING', 'WORD', 'ENDLINE', 'NEWLINE', 'SPACE', 
			'COMMENT', 'CHARACTER'
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
			[4, 0, 9, 86, 6, -1, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 
		    2, 4, 7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 
		    7, 9, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 2, 1, 2, 
		    1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 5, 3, 37, 8, 3, 10, 3, 12, 3, 40, 9, 
		    3, 1, 3, 1, 3, 1, 3, 1, 3, 5, 3, 46, 8, 3, 10, 3, 12, 3, 49, 9, 3, 
		    1, 3, 3, 3, 52, 8, 3, 1, 4, 4, 4, 55, 8, 4, 11, 4, 12, 4, 56, 1, 5, 
		    5, 5, 60, 8, 5, 10, 5, 12, 5, 63, 9, 5, 1, 5, 1, 5, 1, 6, 3, 6, 68, 
		    8, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 8, 1, 8, 5, 8, 76, 8, 8, 10, 8, 12, 
		    8, 79, 9, 8, 1, 8, 1, 8, 1, 8, 1, 8, 1, 9, 1, 9, 0, 0, 10, 1, 1, 3, 
		    2, 5, 3, 7, 4, 9, 5, 11, 6, 13, 7, 15, 8, 17, 9, 19, 0, 1, 0, 2, 2, 
		    0, 9, 9, 32, 32, 4, 0, 48, 57, 65, 90, 95, 95, 97, 122, 93, 0, 1, 
		    1, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 7, 1, 0, 0, 0, 
		    0, 9, 1, 0, 0, 0, 0, 11, 1, 0, 0, 0, 0, 13, 1, 0, 0, 0, 0, 15, 1, 
		    0, 0, 0, 0, 17, 1, 0, 0, 0, 1, 21, 1, 0, 0, 0, 3, 23, 1, 0, 0, 0, 
		    5, 28, 1, 0, 0, 0, 7, 51, 1, 0, 0, 0, 9, 54, 1, 0, 0, 0, 11, 61, 1, 
		    0, 0, 0, 13, 67, 1, 0, 0, 0, 15, 71, 1, 0, 0, 0, 17, 73, 1, 0, 0, 
		    0, 19, 84, 1, 0, 0, 0, 21, 22, 5, 61, 0, 0, 22, 2, 1, 0, 0, 0, 23, 
		    24, 5, 101, 0, 0, 24, 25, 5, 99, 0, 0, 25, 26, 5, 104, 0, 0, 26, 27, 
		    5, 111, 0, 0, 27, 4, 1, 0, 0, 0, 28, 29, 5, 113, 0, 0, 29, 30, 5, 
		    117, 0, 0, 30, 31, 5, 105, 0, 0, 31, 32, 5, 116, 0, 0, 32, 6, 1, 0, 
		    0, 0, 33, 38, 5, 34, 0, 0, 34, 37, 3, 9, 4, 0, 35, 37, 3, 15, 7, 0, 
		    36, 34, 1, 0, 0, 0, 36, 35, 1, 0, 0, 0, 37, 40, 1, 0, 0, 0, 38, 36, 
		    1, 0, 0, 0, 38, 39, 1, 0, 0, 0, 39, 41, 1, 0, 0, 0, 40, 38, 1, 0, 
		    0, 0, 41, 52, 5, 34, 0, 0, 42, 47, 5, 39, 0, 0, 43, 46, 3, 9, 4, 0, 
		    44, 46, 3, 15, 7, 0, 45, 43, 1, 0, 0, 0, 45, 44, 1, 0, 0, 0, 46, 49, 
		    1, 0, 0, 0, 47, 45, 1, 0, 0, 0, 47, 48, 1, 0, 0, 0, 48, 50, 1, 0, 
		    0, 0, 49, 47, 1, 0, 0, 0, 50, 52, 5, 39, 0, 0, 51, 33, 1, 0, 0, 0, 
		    51, 42, 1, 0, 0, 0, 52, 8, 1, 0, 0, 0, 53, 55, 3, 19, 9, 0, 54, 53, 
		    1, 0, 0, 0, 55, 56, 1, 0, 0, 0, 56, 54, 1, 0, 0, 0, 56, 57, 1, 0, 
		    0, 0, 57, 10, 1, 0, 0, 0, 58, 60, 3, 15, 7, 0, 59, 58, 1, 0, 0, 0, 
		    60, 63, 1, 0, 0, 0, 61, 59, 1, 0, 0, 0, 61, 62, 1, 0, 0, 0, 62, 64, 
		    1, 0, 0, 0, 63, 61, 1, 0, 0, 0, 64, 65, 3, 13, 6, 0, 65, 12, 1, 0, 
		    0, 0, 66, 68, 5, 13, 0, 0, 67, 66, 1, 0, 0, 0, 67, 68, 1, 0, 0, 0, 
		    68, 69, 1, 0, 0, 0, 69, 70, 5, 10, 0, 0, 70, 14, 1, 0, 0, 0, 71, 72, 
		    7, 0, 0, 0, 72, 16, 1, 0, 0, 0, 73, 77, 5, 35, 0, 0, 74, 76, 3, 19, 
		    9, 0, 75, 74, 1, 0, 0, 0, 76, 79, 1, 0, 0, 0, 77, 75, 1, 0, 0, 0, 
		    77, 78, 1, 0, 0, 0, 78, 80, 1, 0, 0, 0, 79, 77, 1, 0, 0, 0, 80, 81, 
		    3, 13, 6, 0, 81, 82, 1, 0, 0, 0, 82, 83, 6, 8, 0, 0, 83, 18, 1, 0, 
		    0, 0, 84, 85, 7, 1, 0, 0, 85, 20, 1, 0, 0, 0, 10, 0, 36, 38, 45, 47, 
		    51, 56, 61, 67, 77, 1, 0, 1, 0];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;
		public function __construct(CharStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new LexerATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
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

		public static function vocabulary(): Vocabulary
		{
			static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
		}

		public function getGrammarFileName(): string
		{
			return 'EasyScript.g4';
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		/**
		 * @return array<string>
		 */
		public function getChannelNames(): array
		{
			return self::CHANNEL_NAMES;
		}

		/**
		 * @return array<string>
		 */
		public function getModeNames(): array
		{
			return self::MODE_NAMES;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
		{
			return self::vocabulary();
		}
	}
}