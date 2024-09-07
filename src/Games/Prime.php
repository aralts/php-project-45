<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult, PrintQuestionAndGetAnswer, PrintGameDescription};

use const BrainGames\Games\ROUNDS;

function start(string $name)
{
    $correct_answers = 0;
    $wrong_answer = false;
    $answer = '';

    PrintGameDescription('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($correct_answers < ROUNDS && !$wrong_answer) {
        $number = rand(0, 100);
        $is_prime = check_prime($number);

        $answer = PrintQuestionAndGetAnswer('Question: ' . $number);

        $is_correct = ($is_prime && $answer === 'yes') || (!$is_prime && $answer === 'no');

        CheckAnswer($is_correct, $correct_answers, $wrong_answer);
    }

    PrintRoundResult($name, $wrong_answer, $answer, ($is_prime ? 'yes' : 'no'));
}

function check_prime(int $number)
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
