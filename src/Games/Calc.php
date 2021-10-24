<?php

namespace src\Games\Calc;

use src\Engine;

function calculate(int $randNum1, int $randNum2, string $sign): int
{
    $result = 0;
    switch ($sign) {
        case '+':
            $result = $randNum1 + $randNum2;
            break;
        case '-':
            $result = $randNum1 - $randNum2;
            break;
        case '*':
            $result = $randNum1 * $randNum2;
            break;
        default:
            break;
    }
    return $result;
}

function runGameCalc(): void
{
    $gameDescription = 'What is the result of the expression?';
    $getCorrectAnswer = function (): array {
        $signs = ['+', '-', '*'];
        $randNum1 = mt_rand(0, 100);
        $randNum2 = mt_rand(0, 100);
        $signOperation = $signs[mt_rand(0, 2)];
        $question = ("{$randNum1} {$signOperation} {$randNum2}");
        $correctAnswer = strval(calculate($randNum1, $randNum2, $signOperation));
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
      Engine\engine($getCorrectAnswer, $gameDescription);
}
