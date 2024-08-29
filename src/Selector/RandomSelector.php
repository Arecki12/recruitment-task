<?php

namespace App\Selector;

final readonly class RandomSelector implements SelectorInterface
{
    private const string SELECT_CRITERIA = 'random';

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
        $randomKeys = array_rand($items, 3);

        return array_map(function($key) use ($items) {
            return $items[$key];
        }, $randomKeys);
    }
}
