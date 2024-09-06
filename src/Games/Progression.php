<?php

namespace BrainGames\Games\Progression;

use const BrainGames\Engine\ROUNDS;

use function BrainGames\Engine\check_answer;
use function BrainGames\Engine\print_round_result;
use function cli\line;
use function cli\prompt;

function start($name)
{
  $correct_answers = 0;
  $wrong_ahswer = false;
  $hidden_value = null;
  $answer = '';

  line('What number is missing in the progression?');

  while ($correct_answers < ROUNDS && !$wrong_ahswer) {
    $progression_data = generate_progression();
    $progression = $progression_data['progression'];
    $hidden_value = $progression_data['hidden_value'];

    line('Question: ' . implode(' ', $progression));

    $answer = prompt('Your answer');

    if (ctype_digit($answer)) {
      $is_correct = $hidden_value === (int) $answer;
    } else {
      $is_correct = false;
    }

    check_answer($is_correct, $correct_answers, $wrong_ahswer);
  }

  print_round_result($name, $wrong_ahswer, $answer, $hidden_value);
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
