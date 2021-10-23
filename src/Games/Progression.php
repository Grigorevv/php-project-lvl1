<?php

namespace src\Games\Progression;

use src\Engine;

function getProgression($beginProg, $diff, $progressionLength)
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i += 1) {
        $progression[$i] = $beginProg + $diff * $i;
    }
    return $progression;
}

function runGameEven()
{
    $gameDescription = 'What number is missing in the progression?';
    $getCorrectAnswer = function () {
        $beginProgression = mt_rand(0, 100);
        $diffProgression = mt_rand(1, 10);
        $progressionLength = mt_rand(5, 10);
        $progression = getProgression($beginProgression, $diffProgression, $progressionLength);
        $hiddenNumberIndex = mt_rand(0, $progressionLength);
        $correctAnswer = strval($progression[$hiddenNumberIndex]);
        $progression[$hiddenNumberIndex] = '..';
        $question = implode(' ', $progression);
        return [ 'question' => $question, 'correctAnswer' => $correctAnswer ];
    };
    Engine\engine($getCorrectAnswer, $gameDescription);
}
