<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

try {
    $typeWeatherApp = trim($arParams['TYPE_WEATHER_APP']);
    // Проверка выбранного типа
    switch ($typeWeatherApp) {
        case 'openweathermap':
            $apiKey = trim($arParams['OPEN_WEATHER_MAP_KEY']);
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
            break;
        case 'weatherapi':
            // Получаем параметры
            $apiKey = trim($arParams['WEATHER_API_KEY']);
            $city = trim($arParams['CITY']); // Удаляем лишние пробелы в начале и в конце

            // Проверка наличия названия города
            if (empty($city)) {
                ShowError("Необходимо указать название города.");
                return;
            }

            // URL для API
            $apiUrl = "https://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$city}";

            // Используем curl для выполнения запроса
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            // Проверка кода ответа
            if ($httpCode !== 200) {
                ShowError("Ошибка API: {$httpCode} - " . htmlspecialchars($response));
                return;
            }

            $data = json_decode($response, true);

            // Проверка на наличие ошибок в ответе
            if (isset($data['cod']) && $data['cod'] != 200) {
                ShowError("Ошибка: " . htmlspecialchars($data['message']));
                return;
            }

            // Сохраняем данные о погоде в массив результата
            $arResult['WEATHER'] = $data;

            // Подключаем шаблон компонента
            $this->includeComponentTemplate();
            break;
        default:

            break;
    }

} catch (Exception $e) {
    AddMessage2Log($e->getMessage());
    // Вывод ошибки
    $arResult['ERROR'] = $e->getMessage();
    $this->includeComponentTemplate();
}