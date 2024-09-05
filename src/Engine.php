<?php

namespace BrainGames\Engine;

use function cli\line;

const ROUNDS = 3;

function check_answer($is_correct, &$correct_answers, &$wrong_ahswer)
{
  if ($is_correct) {
    $correct_answers++;
    line('Correct!');
  } else {
    $wrong_ahswer = true;
  }
}

function print_round_result($name, $wrong_ahswer, $answer, $result)
{
  if (!$wrong_ahswer) {
    line('Congratulations, ' . $name . '!');
  } else {
    line("'" . $answer . "' is wrong answer ;( Correct answer was '" . $result . "'.");
    line("Let's try again, " . $name . '!');
  }
}
