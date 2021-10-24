<?php

namespace src\Games\Gcd;

use src\Engine;

function getGcd(int $num1, int $num2): string
{
    $maxNumb = max($num1, $num2);
    $gcd = 1;
    for ($i = 2; $i <= $maxNumb; $i += 1) {
        if ($num1 % $i === 0 && $num2 % $i === 0) {
            $gcd = $i;
        }
    }
    return $gcd;
}

function runGameGcd(): void
{
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $getCorrectAnswer = function (): array {
        $num1 = mt_rand(0, 100);
        $num2 = mt_rand(0, 100);
        $question = "{$num1} {$num2}";
        $correctAnswer = strval(getGcd($num1, $num2));
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
      Engine\engine($getCorrectAnswer, $gameDescription);
}
