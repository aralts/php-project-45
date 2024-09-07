<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult, PrintQuestionAndGetAnswer, PrintGameDescription};

use const BrainGames\Games\ROUNDS;

function start(string $name)
{
    $correct_answers = 0;
    $wrong_answer = false;
    $divisor = 1;
    $answer = '';

    PrintGameDescription('Find the greatest common divisor of given numbers.');

    while ($correct_answers < ROUNDS && !$wrong_answer) {
        $first_number = rand(1, 100);
        $second_number = rand(1, 100);
        $divisor = gcd($first_number, $second_number);

        while ($divisor == 1) {
            $first_number = rand(1, 100);
            $second_number = rand(1, 100);
            $divisor = gcd($first_number, $second_number);
        }

        $answer = PrintQuestionAndGetAnswer('Question: ' . $first_number . ' ' . $second_number);

        if (ctype_digit($answer)) {
            $is_correct = $divisor === (int) $answer;
        } else {
            $is_correct = false;
        }

        CheckAnswer($is_correct, $correct_answers, $wrong_answer);
    }

    PrintRoundResult($name, $wrong_answer, $answer, $divisor);
}

function gcd(int $a, int $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
