<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Games\{CheckAnswer, PrintRoundResult, PrintQuestionAndGetAnswer, PrintGameDescription};

use const BrainGames\Games\ROUNDS;

function start(string $name)
{
    $correct_answers = 0;
    $wrong_answer = false;
    $hidden_value = null;
    $answer = '';

    PrintGameDescription('What number is missing in the progression?');

    while ($correct_answers < ROUNDS && !$wrong_answer) {
        $progression_data = generate_progression();
        $progression = $progression_data['progression'];
        $hidden_value = $progression_data['hidden_value'];

        PrintQuestionAndGetAnswer('Question: ' . implode(' ', $progression));

        if (ctype_digit($answer)) {
            $is_correct = $hidden_value === (int) $answer;
        } else {
            $is_correct = false;
        }

        CheckAnswer($is_correct, $correct_answers, $wrong_answer);
    }

    PrintRoundResult($name, $wrong_answer, $answer, $hidden_value);
}

function generate_progression()
{
    $min_length = 5;
    $max_length = 10;

    $length = rand($min_length, $max_length);

    $start = rand(1, 50);
    $step = rand(1, 10);

    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    $hidden_position = rand(0, $length - 1);
    $hidden_value = $progression[$hidden_position];

    $progression[$hidden_position] = '..';

    return [
        'progression' => $progression,
        'hidden_value' => $hidden_value
    ];
}
