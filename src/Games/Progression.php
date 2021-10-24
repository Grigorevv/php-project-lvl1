<?php

namespace src\Games\Progression;

use src\Engine;

function getProgression(int $beginProg, int $stepProgression, int $progressionLength): array
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i += 1) {
        $progression[$i] = $beginProg + $stepProgression * $i;
    }
    return $progression;
}

function runGameEven()
{
    $gameDescription = 'What number is missing in the progression?';
    $getCorrectAnswer = function (): array {
        $beginProgression = mt_rand(0, 100);
        $stepProgression = mt_rand(1, 10);
        $progressionLength = mt_rand(5, 10);
        $progression = getProgression($beginProgression, $stepProgression, $progressionLength);
        $hiddenNumberIndex = mt_rand(0, $progressionLength - 1);
        $correctAnswer = strval($progression[$hiddenNumberIndex]);
        $progression[$hiddenNumberIndex] = '..';
        $question = implode(' ', $progression);
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
    Engine\engine($getCorrectAnswer, $gameDescription);
}
