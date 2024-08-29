<?php

namespace App\Selector;

final readonly class SpecificFilterSelector implements SelectorInterface
{
    private const string SELECT_CRITERIA = 'specific_filter';

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
            return str_contains($item->getTitle(), 'W') && strlen($item->getTitle()) % 2 === 0;
        });
    }
}
