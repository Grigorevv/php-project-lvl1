<?php

namespace src\Engine;

use function cli\line;
use function cli\prompt;

function engine(callable $getQuestionAndAnswer, string $gameDescription): bool
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?');
    line("Hello, {$playerName}!");
    line($gameDescription);
    $numberOfQuestions = 3;

    for ($i = 0; $i < $numberOfQuestions; $i += 1) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $getQuestionAndAnswer();
        line("Question: {$question}");
        $answerPlayer = prompt('Your answer: ');
        if ($correctAnswer !== $answerPlayer) {
            line("\"{$answerPlayer}\" is wrong answer ;(. Correct answer was \"{$correctAnswer}\".");
            line("Let's try again, {$playerName}!");
            return false;
        }
        line('Correct!');
    };
    line("Congratulations, {$playerName}!");
    return true;
}
