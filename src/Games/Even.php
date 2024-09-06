<?php

namespace BrainGames\Games\Even;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult};
use function cli\{line, prompt};

use const BrainGames\Games\ROUNDS;

function start($name)
{
    $correct_answers = 0;
    $wrong_ahswer = false;
    $answer = '';

    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($correct_answers < ROUNDS && !$wrong_ahswer) {
        $number = rand(0, 100);
        $is_even = $number % 2 === 0;

        line('Question: ' . $number);

        $answer = prompt('Your answer');

        $is_correct = ($is_even && $answer === 'yes') || (!$is_even && $answer === 'no');

        CheckAnswer($is_correct, $correct_answers, $wrong_ahswer);
    }

    PrintRoundResult($name, $wrong_ahswer, $answer, ($is_even ? 'yes' : 'no'));
}
