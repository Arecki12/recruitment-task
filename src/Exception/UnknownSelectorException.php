<?php

namespace App\Exception;

final class UnknownSelectorException extends \Exception
{
    /**
     * @param string $selector
     */
    public function __construct(string $selector)
    {
        parent::__construct("Unknown selector: $selector");
    }
}
