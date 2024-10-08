<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult, PrintQuestionAndGetAnswer, PrintGameDescription};

use const BrainGames\Games\ROUNDS;

function start(string $name)
{
    $correct_answers = 0;
    $wrong_answer = false;
    $operations = ['+', '-', '*'];
    $operation = $operations[rand(0, 2)];

    PrintGameDescription('What is the result of the expression?');

    while ($correct_answers < ROUNDS && !$wrong_answer) {
        $amout = counting(rand(1, 25), rand(1, 25), $operation);

        CheckAnswer($amout['correct'], $correct_answers, $wrong_answer);
    }

    PrintRoundResult($name, $wrong_answer, $amout['answer'], $amout['result']);
}

function counting(int $first_number, int $second_number, string $operation)
{
    $result = null;
    $message = 'Question: ' . $first_number . ' ' . $operation . ' ' . $second_number;

    if ($operation === '-' && $second_number > $first_number) {
        $message = 'Question: ' . $second_number . ' ' . $operation . ' ' . $first_number;
    }

    $answer = PrintQuestionAndGetAnswer($message);

    if ($operation === '+') {
        $result = $first_number + $second_number;
    } elseif ($operation === '-') {
        $result = $second_number > $first_number ? $second_number - $first_number : $first_number - $second_number;
    } elseif ($operation === '*') {
        $result = $first_number * $second_number;
    }

    $response = [
        'correct' => true,
        'result' => $result,
        'answer' => $answer
    ];

    if (ctype_digit($answer)) {
        if ((int) $answer === $result) {
            return $response;
        } else {
            $response['correct'] = false;

            return $response;
        }
    } else {
        $response['correct'] = false;

        return $response;
    }
}
