<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "TYPE_WEATHER_APP" => array(
            "PARENT" => "BASE",
            "NAME" => "Выберите приложение прогноза погоды",
            "TYPE" => "LIST", // Тип параметра — выпадающий список
            "VALUES" => array( // Значения для выпадающего списка
                "openweathermap" => "Open weather map",
                "weatherapi" => "Weather API",
            ),
            "DEFAULT" => "openweathermap", // Значение по умолчанию
        ),
        "OPEN_WEATHER_MAP_KEY" => array(
            "PARENT" => "BASE",
            "NAME" => "Ключ для API openweathermap",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "WEATHER_API_KEY" => array(
            "PARENT" => "BASE",
            "NAME" => "Ключ для API weatherapi",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "CITY" => array(
            "PARENT" => "BASE",
            "NAME" => "Город",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "Moscow",
        ),
    ),
);