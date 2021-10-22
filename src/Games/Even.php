<?php

namespace src\Games\Even;

use src\Engine;

function isEven($num)
{
    return $num % 2 === 0;
}

function runGameEven()
{
    $getCorrectAnswer = function () {
        $question = mt_rand(0, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    Engine\engine($getCorrectAnswer, $gameDescription);
}
