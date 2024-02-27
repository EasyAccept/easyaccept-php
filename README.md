# EasyAccept - PHP

EasyAccept is a tool to automate acceptance testing for your project in an easy way. All you have to do is to provide test scripts written in simple, client-readable commands, and a Facade to your program. EasyAccept does the rest for you.

It's a PHP implementation of the original EasyAccept, written in Java: https://sourceforge.net/projects/easyaccept/

## How to contribute

To contribute to this project, you can fork this repository and submit a pull request with your changes. We will review your code and merge it if it's good. You can also submit issues if you find any bugs or have any suggestions.

### Updating the grammar

We use the ANTLR4 library to parse the test scripts. The grammar is defined in the [`EasyScript.g4`](/src/Testsuite/Grammar/EasyScript.g4) file. If you want to update the grammar, you can do so by editing this file and running `./grammar.sh generate` to generate the parser. Running the script, the required ANTLR4 library will be downloaded and the parser will be generated. You will need to have [Docker](https://docs.docker.com/get-docker/) installed to run the script.
