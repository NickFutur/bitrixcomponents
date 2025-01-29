<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// Проверяем, есть ли данные о погоде

if ($arResult['WEATHER']) {
    $weather = $arResult['WEATHER'];
//    var_dump($weather);
    echo "<h2>Погода в городе {$weather['name']}</h2>";
    echo "<p>Температура: {$weather['main']['temp']}°C</p>";
    echo "<p>Погода: {$weather['weather'][0]['description']}</p>";
    echo "<p>Влажность: {$weather['main']['humidity']}%</p>";
    echo "<p>Ветер: {$weather['wind']['speed']} м/с</p>";
} else {
//    var_dump($weather);
    echo "<p>Не удалось получить данные о погоде.</p>";
}
?>