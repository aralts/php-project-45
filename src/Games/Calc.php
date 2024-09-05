<?php

namespace BrainGames\Games\Calc;

use const BrainGames\Engine\ROUNDS;

use function BrainGames\Engine\check_answer;
use function BrainGames\Engine\print_round_result;
use function cli\line;
use function cli\prompt;

function start($name)
{
  $correct_answers = 0;
  $wrong_ahswer = false;
  $operations = ['+', '-', '*'];
  $operation = $operations[rand(0, 2)];

  line('What is the result of the expression?');

  while ($correct_answers < ROUNDS && !$wrong_ahswer) {
    $amout = counting(rand(1, 25), rand(1, 25), $operation);

    check_answer($amout['correct'], $correct_answers, $wrong_ahswer);
  }

  print_round_result($name, $wrong_ahswer, $amout['answer'], $amout['result']);
}

function counting($first_number, $second_number, $operation)
{
  $message = 'Question: ' . $first_number . ' ' . $operation . ' ' . $second_number;

  if ($operation === '-' && $second_number > $first_number) {
    $message = 'Question: ' . $second_number . ' ' . $operation . ' ' . $first_number;
  }

  line($message);

  $answer = prompt('Your answer');

  if ($operation === '+') {
    $result = $first_number + $second_number;
  } else if ($operation === '-') {
    $result = $second_number > $first_number ? $second_number - $first_number : $first_number - $second_number;
  } else if ($operation === '*') {
    $result = $first_number * $second_number;
  }

  if (ctype_digit($answer)) {
    $answer = (int) $answer;

    $response = [
      'correct' => true,
      'result' => $result,
      'answer' => $answer
    ];

    if ($answer === $result) {
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
