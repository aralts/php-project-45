<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult, PrintQuestionAndGetAnswer, PrintGameDescription};

use const BrainGames\Games\ROUNDS;

function start(string $name)
{
    $correct_answers = 0;
    $wrong_answer = false;
    $answer = '';

    PrintGameDescription('Answer "yes" if the number is even, otherwise answer "no".');

    while ($correct_answers < ROUNDS && !$wrong_answer) {
        $number = rand(0, 100);
        $is_even = $number % 2 === 0;

        PrintQuestionAndGetAnswer('Question: ' . $number);

        $is_correct = ($is_even && $answer === 'yes') || (!$is_even && $answer === 'no');

        CheckAnswer($is_correct, $correct_answers, $wrong_answer);
    }

    PrintRoundResult($name, $wrong_answer, $answer, ($is_even ? 'yes' : 'no'));
}
