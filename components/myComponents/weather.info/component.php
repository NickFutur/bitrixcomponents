<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

try {
    $apiKey = 'you_key';
    $city = trim($arParams['CITY']); // Удаляем лишние пробелы в начале и в конце

    if (empty($city)) {
        throw new Exception("Необходимо указать название города.");
    }

    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric&lang=ru";

    // Используем curl для выполнения запроса
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        throw new Exception("Ошибка API: {$httpCode} - " . $response);
    }

    $data = json_decode($response, true);

    if (isset($data['cod']) && $data['cod'] != 200) {
        throw new Exception("Ошибка: " . $data['message']);
    }

    $arResult['WEATHER'] = $data;
    $this->includeComponentTemplate();

} catch (Exception $e) {
    AddMessage2Log($e->getMessage());
}