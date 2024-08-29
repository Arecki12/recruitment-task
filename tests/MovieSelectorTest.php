<?php

use App\Enum\AvailableCriteriaEnum;
use App\Exception\UnknownSelectorException;
use App\Object\Movie;
use App\MovieSelector;
use App\Selector\MoreThanOneWordSelector;
use App\Selector\RandomSelector;
use App\Selector\SpecificFilterSelector;
use PHPUnit\Framework\TestCase;

class MovieSelectorTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function check_movies_file_exist()
    {
        $this->assertFileExists(dirname(__DIR__) . "/movies.php");
    }

    public function test_selector_resolver_resolve()
    {
        $this->expectException(UnknownSelectorException::class);

        $resolver = new MovieSelector();
        $resolver->getSelectorMovieByCriteria(AvailableCriteriaEnum::INCORRECT_SELECTOR);
    }

    public function test_more_than_one_word_selector()
    {
        $selector = new MoreThanOneWordSelector();

        $movies = [
            new Movie("Szeregowiec Ryan"),
            new Movie("Doktor Strange"),
            new Movie("Avengers"),
            new Movie("Whiplash"),
        ];

        $result = $selector->select($movies);
        $this->assertCount(2, $result);
    }

    public function test_random_selector()
    {
        $selector = new RandomSelector();

        $movies = [
            new Movie("Szeregowiec Ryan"),
            new Movie("Doktor Strange"),
            new Movie("Avengers"),
            new Movie("Whiplash"),
        ];

        $result = $selector->select($movies);
        $this->assertLessThanOrEqual(3, count($result));
    }

    public function test_specific_filters_selector()
    {
        $selector = new SpecificFilterSelector();

        $movies = [
            new Movie("Szeregowiec Ryan"),
            new Movie("Doktor Strange"),
            new Movie("Avengers"),
            new Movie("Whiplash"),
        ];

        $result = $selector->select($movies);
        $this->assertCount(1, $result);
    }
}
