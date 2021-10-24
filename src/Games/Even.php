<?php

namespace src\Games\Even;

use src\Engine;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function runGameEven()
{
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $getCorrectAnswer = function (): array {
        $question = mt_rand(0, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
    Engine\engine($getCorrectAnswer, $gameDescription);
}
