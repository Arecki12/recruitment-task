<?php

namespace App;

use App\Enum\AvailableCriteriaEnum;
use App\Exception\UnknownSelectorException;
use App\Selector\MoreThanOneWordSelector;
use App\Selector\RandomSelector;
use App\Selector\SelectorInterface;
use App\Selector\SpecificFilterSelector;

final readonly class MovieSelector
{
    /**
     * @var SelectorInterface[]
     */
    private iterable $handlers;

    public function __construct()
    {
        $this->handlers = [
            MoreThanOneWordSelector::class,
            RandomSelector::class,
            SpecificFilterSelector::class,
        ];
    }

    /**
     * @param string $criteria
     * @return SelectorInterface
     * @throws UnknownSelectorException
     */
    public function getSelectorMovieByCriteria(AvailableCriteriaEnum $criteria): SelectorInterface
    {
        foreach ($this->handlers as $handler) {
            $handler = new $handler;
            if ($handler->getSelectCriteria() === $criteria->value) {
                return $handler;
            }
        }

        throw new UnknownSelectorException($criteria->value);
    }
}
