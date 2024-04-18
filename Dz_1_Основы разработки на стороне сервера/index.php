<?php ini_set("display_errors", 1); ?>


<!-- 1. Создайте конвертор валют. Пользователь вводит количество в USD и выбирает, в какую валюту хочет перевести: EUR, UAH
или KZT, и получает в ответ соответствующую сумму. -->

<form method="get">
    <input type="text" name="currency" placeholder="USD">
    <input type="text" value="Convert" placeholder="curreny choice(KZT, RUB, CNY, JPY)">
    <button type="submit">Convert</button>
</form>

<?php
$currency = $_GET["currency"];
$convert = $_GET["Convert"];
echo $res = match ($currency) {
    "KZT" => $convert * 449.26,
    "RUB" => $convert * 94.07,
    "CNY" => $convert * 7.24,
    "JPY" => $convert * 154.61,
    default => $currency,
}
    ?>

<!-- 2. Определите знак зодиака пользователя. Попросите пользователя ввести свою дату рождения (месяц и день) и на основе
этой информации определите его знак зодиака. Выведите на экран
соответствующий знак зодиака. -->

<form method="get">
    <input type="text" name="day" placeholder="day">
    <input type="text" name="month" placeholder="month">
    <button type="submit">Sign</button>
</form>

<?php
$day = $_GET["day"];
$month = $_GET["month"];

switch ($month) {
    case "January":
        if ($day < 20)
            echo "Capricorn";
        else
            echo "Aquarius";
        break;
    case "February":
        if ($day < 20)
            echo "Aquarius";
        else
            echo "Pisces";
        break;
    case "March":
        if ($day < 20)
            echo "Pisces";
        else
            echo "Aries";
        break;
    case "April":
        if ($day < 20)
            echo "Aries";
        else
            echo "Taurus";
        break;
    case "May":
        if ($day < 20)
            echo "Taurus";
        else
            echo "Gemini";
        break;
    case "June":
        if ($day < 20)
            echo "Gemini";
        else
            echo "Cancer";
        break;
    case "July":
        if ($day < 20)
            echo "Cancer";
        else
            echo "Leo";
        break;
    case "August":
        if ($day < 20)
            echo "Leo";
        else
            echo "Virgo";
        break;
    case "September":
        if ($day < 20)
            echo "Virgo";
        else
            echo "Libra";
        break;
    case "October":
        if ($day < 20)
            echo "Libra";
        else
            echo "Scorpio";
        break;
    case "November":
        if ($day < 20)
            echo "Scorpio";
        else
            echo "Sagittarius";
        break;
    case "December":
        if ($day < 20)
            echo "Sagittarius";
        else
            echo "Capricorn";
        break;
}
?>

<!-- 3. Создайте калькулятор времени. Форма принимает количество минут и выводит его в формате часы:минуты. Например, если 
пользователь вводит 150 минут, скрипт должен вывести 2:30.-->

<form method="get">
    <input type="text" name="minutes" placeholder="minutes">
    <button type="submit">Convert</button>
</form>

<?php
$minutes = $_GET["minutes"];
$timeHours = floor($minutes / 60);
$timeMinutes = $minutes % 60;
echo "$timeHours:$timeMinutes";
?>

<!-- 4. Создайте форму кинокритика. Пользователь вводит
оценку (от 1 до 10) для недавно просмотренного фильма. Скрипт
выводит рекомендацию о том, стоит ли посмотреть этот фильм на 
основе оценки (например, «Отличный выбор!», «Неудача, лучше выбрать что-то другое»). -->

<form method="get">
    <input type="text" name="rating" placeholder="rating">
    <button type="submit">Sign</button>
</form>

<?php

$rating = $_GET["rating"];

if ($rating <= 5) {
    echo "Неудача, лучше выбрать что-то другое";
} else if ($rating <= 7) {
    echo "Неплохо!";
} else {
    echo "Отличный выбор!";
}
?>

<!-- 5. Создайте генератор рецепта кофе. Пользователь выбирает
тип кофе (латте, капучино, эспрессо) и желаемый размер порции
(маленькая, средняя, большая). В зависимости от выбора скрипт
выводит рецепт приготовления кофе с указанием количества ингредиентов. -->

<form method="get">
    <input type="text" name="type" placeholder="type">
    <input type="text" name="size" placeholder="size">
    <button type="submit">Sign</button>
</form>

<?php

$type = $_GET["type"];
$size = $_GET["size"];

switch ($type) {
    case "Latte":
        echo recipeLatte($size);
        break;
    case "Cappuccino":
        echo recipeСappuccino($size);
        break;
    case "Espresso":
        echo recipeEspresso($size);
}

function recipeLatte($size)
{
    if ($size == "small")
        return "сироп – 25мл, молоко 3,2% – 100мл, кофе натуральный (эспрессо) – 25мл";
    else if ($size == "medium")
        return "сироп – 50мл, молоко 3,2% – 150мл, кофе натуральный (эспрессо) – 50мл";
    else if ($size == "large")
        return "сироп – 80мл, молоко 3,2% – 180мл, кофе натуральный (эспрессо) – 800мл";
}

function recipeСappuccino($size)
{
    if ($size == "small")
        return "Кофе молотый - 1 чайную ложку, молоко - 150мл, вода - 100мл, сахар - по вкусу.";
    else if ($size == "medium")
        return "Кофе молотый - 2 чайных ложки, молоко - 200мл, вода - 150мл, сахар - по вкусу.";
    else if ($size == "large")
        return "Кофе молотый - 3 чайных ложки, молоко - 250мл, вода - 200мл, сахар - по вкусу.";
}

function recipeEspresso($size)
{
    if ($size == "small")
        return "Кофе молотый - 5г, вода - 23мл";
    else if ($size == "medium")
        return "Кофе молотый - 7г, вода - 30мл";
    else if ($size == "large")
        return "Кофе молотый - 10г, вода - 40мл";
}
?>