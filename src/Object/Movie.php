<?php

namespace App\Object;

final readonly class Movie
{
    /**
     * @param string $title
     */
    public function __construct(
        private string $title
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
