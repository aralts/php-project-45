<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult};
use function cli\{line, prompt};

use const BrainGames\Games\ROUNDS;

function start($name)
{
    $correct_answers = 0;
    $wrong_ahswer = false;
    $divisor = 1;
    $answer = '';

    line('Find the greatest common divisor of given numbers.');

    while ($correct_answers < ROUNDS && !$wrong_ahswer) {
        $first_number = rand(1, 100);
        $second_number = rand(1, 100);
        $divisor = gcd($first_number, $second_number);

        while ($divisor == 1) {
            $first_number = rand(1, 100);
            $second_number = rand(1, 100);
            $divisor = gcd($first_number, $second_number);
        }

        line('Question: ' . $first_number . ' ' . $second_number);

        $answer = prompt('Your answer');

        if (ctype_digit($answer)) {
            $is_correct = $divisor === (int) $answer;
        } else {
            $is_correct = false;
        }

        CheckAnswer($is_correct, $correct_answers, $wrong_ahswer);
    }

    PrintRoundResult($name, $wrong_ahswer, $answer, $divisor);
}

function gcd($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
