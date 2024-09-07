<?php

namespace BrainGames\Games;

use function cli\{line, prompt};

const ROUNDS = 3;

function CheckAnswer(bool $is_correct, int &$correct_answers, bool &$wrong_answer)
{
    if ($is_correct) {
        $correct_answers++;
        line('Correct!');
    } else {
        $wrong_answer = true;
    }
}

function PrintRoundResult(string $name, bool $wrong_answer, string $answer, int | string $result)
{
    if (!$wrong_answer) {
        line('Congratulations, ' . $name . '!');
    } else {
        line("'" . $answer . "' is wrong answer ;( Correct answer was '" . $result . "'.");
        line("Let's try again, " . $name . '!');
    }
}

function PrintQuestionAndGetAnswer($message) {
    line($message);

    return prompt('Your answer');
}

function PrintGameDescription($message) {
    line($message);
}