<?php
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\AutoMapper;

global $mapper;

// Register the mapping.
$automapperConfig = new AutoMapperConfig();
$automapperConfig->registerMapping(\stdClass::class, CountryNameDTO::class);
$automapperConfig->registerMapping(\stdClass::class, CountryDTO::class);

$automapperConfig->registerMapping(CountryNameDTO::class, Models\CountryName::class);
$automapperConfig->registerMapping(CountryDTO::class, Models\Country::class)
    ->forMember('borders', function (CountryDTO $source) {
        return implode("|", $source->borders);})
    ->forMember('latlng', function (CountryDTO $source) {
        return implode("|", $source->borders);})
    ->forMember('timezones', function (CountryDTO $source) {
        return implode("|", $source->borders);})
    ->forMember('translations', function (CountryDTO $source) {
        return implode("|", $source->borders);})
    ->forMember('currencies', function (CountryDTO $source) {
        return implode("|", $source->borders);})
    ->forMember('languages', function (CountryDTO $source) {
        return implode("|", $source->borders);
    });
$mapper = new AutoMapper($automapperConfig);

//die(print_r($mapper,true));
