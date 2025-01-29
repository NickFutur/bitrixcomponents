<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
    "NAME" => GetMessage("MAIN_WEATHER_NAME"),
    "DESCRIPTION" => GetMessage("MAIN_WEATHER_DESCRIPTION"),
    "ICON" => "/images/icon.gif",
    "PATH" => array(
        "ID" => "myComponents",
//        "NAME" => GetMessage("COMPONENTS_DIR_NAME"),
        "CHILD" => array(
            "ID" => "curdate",
            "NAME" => GetMessage("CHILD_WEATHER_NAME")
        )
    ),

);