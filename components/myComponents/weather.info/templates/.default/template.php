<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- Проверяем, есть ли данные о погоде-->
<?if ($arResult['WEATHER']):?>
<?php
    $typeWeatherApp = trim($arParams['TYPE_WEATHER_APP']); // Исправлено на правильное название параметра
    $weather = $arResult['WEATHER']; ?>
<!-- Проверка выбранного типа -->
<?php switch ($typeWeatherApp): ?>
<?php case 'openweathermap': ?>
<div class="weather-block">
    <div class="weather-block__info-block">
        <div class="info-block__temp">
            <p><?= htmlspecialchars($weather['main']['temp']) ?>°C</p>
        </div>
        <div class="info-block__wind">
            <p>Ощущается как: <?= htmlspecialchars($weather['main']['feels_like']) ?>°C</p>
            <p>Влажность: <?= htmlspecialchars($weather['main']['humidity']) ?>%</p>
            <p>Скорость ветра: <?= htmlspecialchars($weather['wind']['speed']) ?> м/с</p>
            <p>Порывы до: <?= htmlspecialchars($weather['wind']['gust']) ?> м/с</p>
        </div>
    </div>
    <div class="weather-block__time-place-block">
        <h2>Погода</h2>
        <p><?= htmlspecialchars($weather['name']) ?></p>
        <p style="text-transform: capitalize;"><?= htmlspecialchars($weather['weather'][0]['description']) ?></p>
    </div>
</div>


<?php break; ?>
<?php case 'weatherapi': ?>
<div class="weather-block">
    <div class="weather-block__info-block">
        <div class="info-block__temp">
            <img src='<?= htmlspecialchars($weather['current']['condition']['icon']) ?>' alt="Иконка погоды">
            <p><?= htmlspecialchars($weather['current']['temp_c']) ?>°C</p>
        </div>
        <div class="info-block__wind">
            <p>Ощущается как: <?= htmlspecialchars($weather['current']['feelslike_c']) ?>°C</p>
            <p>Влажность: <?= htmlspecialchars($weather['current']['humidity']) ?>%</p>
            <p>Скорость ветра: <?= htmlspecialchars($weather['current']['wind_mph']) ?> м/с</p>
            <p>Порывы до: <?= htmlspecialchars($weather['current']['gust_mph']) ?> м/с</p>
        </div>
    </div>
    <div class="weather-block__time-place-block">
        <h2>Погода</h2>
        <p><?= htmlspecialchars($weather['location']['name']) ?></p>
        <p style="text-transform: capitalize;"><?= htmlspecialchars($weather['current']['condition']['text']) ?></p>
    </div>
</div>

<?php break; ?>
<?php endswitch; ?>
<? else: ?>
<p>Не удалось получить данные о погоде.</p>
<? endif; ?>

<?php
//вывод ошибки на экран
if (!empty($arResult['ERROR'])){
    echo '<div style="color: red;  margin-bottom: 20px;">';
    echo htmlspecialcharsbx($arResult['ERROR']);
    echo '</div>';
}
?>