<?php

namespace App\Selector;

final readonly class MoreThanOneWordSelector implements SelectorInterface
{
    private const string SELECT_CRITERIA = 'more_than_one_word';

    /**
     * @return string
     */
    public function getSelectCriteria(): string
    {
        return self::SELECT_CRITERIA;
    }

    /**
     * @param array $items
     * @return array
     */
    public function select(array $items): array
    {
        return array_filter($items, function ($item) {
            return str_contains($item->getTitle(), ' ');
        });
    }
}

