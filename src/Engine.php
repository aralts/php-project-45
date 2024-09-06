<?php

namespace BrainGames\Games;

use function cli\line;

const ROUNDS = 3;

function CheckAnswer($is_correct, &$correct_answers, &$wrong_ahswer)
{
    if ($is_correct) {
        $correct_answers++;
        line('Correct!');
    } else {
        $wrong_ahswer = true;
    }
}

function PrintRoundResult($name, $wrong_ahswer, $answer, $result)
{
    if (!$wrong_ahswer) {
        line('Congratulations, ' . $name . '!');
    } else {
        line("'" . $answer . "' is wrong answer ;( Correct answer was '" . $result . "'.");
        line("Let's try again, " . $name . '!');
    }
}
