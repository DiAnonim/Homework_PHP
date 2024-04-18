<?php ini_set("display_errors", 1); ?>



<!-- Задания на циклы -->
<!-- 1. Переведите число из двоичной системы счисления в шестнадцатеричную. Формат вывода по умолчанию, поместить в парный тег <p>. -->
<?php
function binaryToHex($binary)
{
    $hex = ""; 

    for ($i = 0; $i < strlen($binary); $i += 4) {
        $fourBits = substr($binary, $i, 4);
        $hex .= base_convert($fourBits, 2, 16);
    }

    return $hex;
}
echo "<p>".binaryToHex("10101010")."</p>";
echo "<p>".binaryToHex("00000000")."</p>";
echo "<p>".binaryToHex("11111111")."</p>";
?>

<!-- Задания на циклы
2. Сгенерируйте 100 случайных чисел в массив, а далее при переборе 
массива найдите максимальное и минимальное число и выведите их на экран.  -->
<?php
$arrayInt = [];
for ($i = 0; $i < 100; $i++) {
    $arrayInt[] = rand(0, 1000);
}

$max = $arrayInt[0];
$min = $arrayInt[0];
for ($i = 0; $i < 100; $i++) {
    if ($arrayInt[$i] > $max) {
        $max = $arrayInt[$i];
    }
    if ($arrayInt[$i] < $min) {
        $min = $arrayInt[$i];
    }
}
echo "Максимальное число: " . $max . "<br>";
echo "Минимальное число: " . $min . "<br>";

?>


<!-- 
1. Создайте функцию, которая принимает на входе массив,
ищет в нем отрицательные числа, выводит массив на страницу
и меняет цвет отрицательных чисел на красный. -->

<?php
$arrayInt = [];
for ($i = 0; $i < 10; $i++) {
    $arrayInt[] = rand(-1000, 1000);
}

function find_negative($arrayInt)
{
    foreach ($arrayInt as $value) {
        if ($value < 0) {
            echo "<span style='color:red'>" . $value . "</span><br>";
        } else {
            echo $value . "<br>";
        }
    }
}

find_negative($arrayInt);
?>

<!-- Задания на функции
2. Создайте функцию, которая на входе принимает переменные name,
 image, price и создаёт карточку продукта с информацией о нём и кнопкой «Купить». -->

<?php
function create_product($name, $image, $price)
{
    echo "<div class='product'><img src='" . $image . "'><h3>" . $name . "</h3><p>" . $price . "</p><button>Купить</button></div>";
}

create_product("Карточка продукта 1", "images/product1.jpg", "1000");
?>

<!-- 
3. Создайте функцию, которая на вход принимает два числа:
число, которое нужно возвести в степень и степень до которого
нужно возвести число. -->

<?php
function power($number, $power)
{
    $res = 1;
    for ($i = 0; $i < $power; $i++) {
        $res *= $number;
    }
    return $res;
}

echo "2 в степени 3 = " . power(2, 3);
?>