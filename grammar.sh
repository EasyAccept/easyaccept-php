#!/bin/bash

set -euo pipefail

PROJECT_DIR=$(dirname "$(realpath "$0")")
USER_ID=$(id -u "${USER}")
GROUP_ID=$(id -g "${USER}")

prepare_docker() {
    # Build the docker image
    cd "$PROJECT_DIR/docker/java"
    docker build -t easyaccept/java .
}

prepare_grammar() {
    mkdir -p "$PROJECT_DIR/.tmp/grammar/target"
    cp "$PROJECT_DIR/src/Testsuite/Grammar/EasyScript.g4" "$PROJECT_DIR/.tmp/grammar/"
}

java() {
    # Run the 'javac' command
    docker run --rm -it -u "$USER_ID:$GROUP_ID" -v "$PROJECT_DIR:/work" --entrypoint="java" easyaccept/java "$@"
}

javac() {
    # Run the 'javac' command
    docker run --rm -it -u "$USER_ID:$GROUP_ID" -v "$PROJECT_DIR:/work" --entrypoint="javac" easyaccept/java "$@"
}

antlr4() {
    # Run the 'antlr4' command
    java -Xmx500M -cp /usr/local/lib/antlr4-tool.jar org.antlr.v4.Tool "$@"
}

antlr4_parse() {
    # Run the 'antlr4-parse' command
    java -cp /usr/local/lib/antlr4-tool.jar:.tmp/grammar/target/ org.antlr.v4.gui.TestRig "$@"
}

help() {
    echo
    echo "Usage:  $0 COMMAND"
    echo
    echo "Commands:"
    echo "  generate   Generate the grammar"
    echo "  tree       Parse the grammar and print the parse tree"
    echo "  help       Display this help message"
    echo
}

# Prepare temporary directory
mkdir -p "$PROJECT_DIR/.tmp"

if [ "$#" -ne 1 ]; then
    help
    exit 1
fi

if [ "$1" == "help" ]; then
    help
    exit 0
fi

if [ "$1" == "generate" ]; then
    prepare_docker

    # Generate the grammar
    antlr4 -Dlanguage=PHP -package EasyAccept\\Testsuite\\Grammar\\EasyScript -no-listener -visitor -Xexact-output-dir -o src/Testsuite/Grammar/EasyScript src/Testsuite/Grammar/EasyScript.g4

    # Update the autoloader
    cd "${PROJECT_DIR}"
    composer dump-autoload

    exit 0
fi

if [ "$1" == "tree" ]; then
    prepare_docker
    prepare_grammar

    # Generate the grammar as Java files
    antlr4 -Dlanguage=Java .tmp/grammar/EasyScript.g4

    # Compile the grammar
    JAVA_FILES=$(find "$PROJECT_DIR"/.tmp/grammar -name "*.java" -print0 | tr '\0' ' ')
    JAVA_FILES=${JAVA_FILES//"$PROJECT_DIR"\//}
    javac -cp /usr/local/lib/antlr4-tool.jar -d .tmp/grammar/target $JAVA_FILES

    # Run the 'antlr4-parse' command
    echo "Write your input and press Ctrl+D to finish."
    antlr4_parse EasyScript easy -tree

    exit 0
fi

echo "Invalid command '$1'."
echo "Run '$0 help' for usage."
exit 1
