<?php

use App\Enum\AvailableCriteriaEnum;
use App\Object\Movie;
use App\MovieSelector;

require 'vendor/autoload.php';

$importedData = require __DIR__ . "/movies.php";

$selector = new MovieSelector();

$movies = array_map(function($movie) {
    return new Movie($movie);
}, $importedData);

try {
    $randomMovies = $selector
        ->getSelectorMovieByCriteria(AvailableCriteriaEnum::RANDOM)
        ->select($movies)
    ;

    print_r($randomMovies);

    $moviesWithMoreThanOneWord = $selector
        ->getSelectorMovieByCriteria(AvailableCriteriaEnum::MORE_THAN_ONE_WORD)
        ->select($movies)
    ;

    print_r($moviesWithMoreThanOneWord);


    $specificFilterMovies = $selector
        ->getSelectorMovieByCriteria(AvailableCriteriaEnum::SPECIFIC_FILTER)
        ->select($movies)
    ;

    print_r($specificFilterMovies);

    $selector
        ->getSelectorMovieByCriteria(AvailableCriteriaEnum::INCORRECT_SELECTOR)
        ->select($movies)
    ;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

