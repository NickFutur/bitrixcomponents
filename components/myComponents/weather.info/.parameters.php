<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "CITY" => array(
            "PARENT" => "BASE",
            "NAME" => "Город",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "Moscow",
        ),
        "OPEN_WEATHER_MAP_KEY" => array(
            "PARENT" => "BASE",
            "NAME" => "Ключ для API openweathermap",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
    ),
);