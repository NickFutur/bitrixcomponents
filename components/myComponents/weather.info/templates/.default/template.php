<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// Проверяем, есть ли данные о погоде

if ($arResult['WEATHER']) {
    $weather = $arResult['WEATHER'];
    echo "<h2>Погода в городе {$weather['name']}</h2>";
    echo "<p>Температура: {$weather['main']['temp']}°C</p>";
    echo "<p>Погода: {$weather['weather'][0]['description']}</p>";
    echo "<p>Влажность: {$weather['main']['humidity']}%</p>";
    echo "<p>Ветер: {$weather['wind']['speed']} м/с</p>";
} else {
    echo "<p>Не удалось получить данные о погоде.</p>";
}

//вывод ошибки на экран
if (!empty($arResult['ERROR'])){
    echo '<div style="color: red;  margin-bottom: 20px;">';
    echo htmlspecialcharsbx($arResult['ERROR']);
    echo '</div>';
}
?>