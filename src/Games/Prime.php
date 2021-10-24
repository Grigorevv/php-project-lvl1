<?php

namespace src\Games\Prime;

use src\Engine;

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function runGameEven()
{
    $gameDescription = 'Answer "yes" if the number is prime, otherwise answer "no".';
    $getCorrectAnswer = function (): array {
        $question = mt_rand(0, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
    Engine\engine($getCorrectAnswer, $gameDescription);
}
