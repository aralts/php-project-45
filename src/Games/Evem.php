<?php

namespace BrainGames\Games\Even;

use const BrainGames\Engine\ROUNDS;

use function BrainGames\Engine\check_answer;
use function BrainGames\Engine\print_round_result;
use function cli\line;
use function cli\prompt;

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

    check_answer($is_correct, $correct_answers, $wrong_ahswer);
  }

  print_round_result($name, $wrong_ahswer, $answer, ($is_even ? 'yes' : 'no'));
}
