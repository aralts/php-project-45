<?php

namespace BrainGames\Games;

use function cli\line;

const ROUNDS = 3;

function CheckAnswer(bool $is_correct, int &$correct_answers, bool &$wrong_ahswer)
{
    if ($is_correct) {
        $correct_answers++;
        line('Correct!');
    } else {
        $wrong_ahswer = true;
    }
}

function PrintRoundResult(string $name, bool $wrong_ahswer, string $answer, int $result)
{
    if (!$wrong_ahswer) {
        line('Congratulations, ' . $name . '!');
    } else {
        line("'" . $answer . "' is wrong answer ;( Correct answer was '" . $result . "'.");
        line("Let's try again, " . $name . '!');
    }
}
