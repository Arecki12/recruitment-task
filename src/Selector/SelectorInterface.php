<?php

namespace App\Selector;

interface SelectorInterface
{
    /**
     * @return string
     */
    public function getSelectCriteria(): string;

    /**
     * @param array $items
     * @return array
     */
    public function select(array $items): array;
}
