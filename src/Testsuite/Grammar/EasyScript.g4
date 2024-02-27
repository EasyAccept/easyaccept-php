grammar EasyScript;

/**
 * Parser Rules
 */

easy: ENDLINE* instruction? ENDLINE* EOF ;

instruction: SPACE* command (ENDLINE+ instruction)? ;

command: echo_
       | quit_
       | unknownCommand ;

echo_: ECHO_ argumentList? ;
quit_: QUIT_ ;

unknownCommand: WORD argumentList?;

argumentList: SPACE+ argument argumentList? ;

argument: STRING
        | WORD (ASSIGN (STRING | WORD))?;

/**
 * Lexer Rules
 */

ASSIGN: '=';

// Known commands
ECHO_: 'echo';
QUIT_: 'quit';

STRING: '"' (WORD | SPACE)* '"' | '\'' (WORD | SPACE)* '\'';

WORD: CHARACTER+;

ENDLINE: SPACE* NEWLINE;

NEWLINE: '\r'? '\n';

SPACE: ' ' | '\t';

COMMENT: '#' CHARACTER* NEWLINE -> channel(HIDDEN);

fragment CHARACTER : [0-9a-zA-Z_];
