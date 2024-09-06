<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult};
use function cli\{line, prompt};

use const BrainGames\Games\ROUNDS;

function start($name)
{
    $correct_answers = 0;
    $wrong_ahswer = false;
    $answer = '';

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($correct_answers < ROUNDS && !$wrong_ahswer) {
        $number = rand(0, 100);
        $is_prime = check_prime($number);

        line('Question: ' . $number);

        $answer = prompt('Your answer');

        $is_correct = ($is_prime && $answer === 'yes') || (!$is_prime && $answer === 'no');

        CheckAnswer($is_correct, $correct_answers, $wrong_ahswer);
    }

    PrintRoundResult($name, $wrong_ahswer, $answer, ($is_prime ? 'yes' : 'no'));
}

function check_prime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
