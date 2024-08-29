<?php

namespace App\Enum;

enum AvailableCriteriaEnum: string
{
    case MORE_THAN_ONE_WORD = 'more_than_one_word';
    case RANDOM = 'random';
    case SPECIFIC_FILTER = 'specific_filter';
    case INCORRECT_SELECTOR = "incorrect";
}
