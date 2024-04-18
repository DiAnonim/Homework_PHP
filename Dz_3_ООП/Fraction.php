<!-- Создайте класс, хранящий в себе отдельно числитель и знаменатель дроби, и следующие методы для работы с этим классом:
§ Метод сложения 3-х объектов-дробей.
§ Метод вычитания 2-х объектов-дробей.
§ Метод умножения 4-х объектов-дробей.
§ Метод деления 2-х объектов-дробей.
§ Метод сокращения дроби.  -->

<?php

class Fraction
{
    private $numerator;
    private $denominator;

    private $integer;

    public function __construct($numerator, $denominator, $integer = 0)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
        $this->integer = $integer;
    }

    // Метод сложения 2-х объектов-дробей.
    public function sum(Fraction $fraction)
    {
        $commonDenominator = $this->denominator * $fraction->denominator;

        $thisNumerator = $this->numerator * $fraction->denominator;
        $fractionNumerator = $fraction->numerator * $this->denominator;

        $numerator = $thisNumerator + $fractionNumerator;

        $integer = $this->integer + $fraction->integer + intval($numerator / $commonDenominator);
        $numerator %= $commonDenominator;

        $result = new Fraction($numerator, $commonDenominator, $integer);

        $result->simplify();
        $result->mixed_fractions();

        return $result;
    }

    // Метод сложения 3-х объектов-дробей.
    public function sum_3x_fractions(Fraction $fraction1, Fraction $fraction2)
    {
        return $this->sum($fraction1)->sum($fraction2);
    }

    // Метод вычитания 2-х объектов-дробей.
    public function subtract(Fraction $fraction)
    {
        $commonDenominator = $this->denominator * $fraction->denominator;

        $thisNumerator = $this->numerator * $fraction->denominator;
        $fractionNumerator = $fraction->numerator * $this->denominator;
        $numerator = $thisNumerator - $fractionNumerator;

        $integer = $this->integer - $fraction->integer + intval($numerator / $commonDenominator);
        $numerator %= $commonDenominator;

        $result = new Fraction($numerator, $commonDenominator, $integer);

        $result->simplify();
        $result->mixed_fractions();

        return $result;
    }

    // Метод умножения 2-х объектов-дробей.
    public function multiply(Fraction $fraction)
    {
        $numerator = $this->numerator * $fraction->numerator;
        $denominator = $this->denominator * $fraction->denominator;

        $result = new Fraction($numerator, $denominator, 0);
        $result->simplify();
        $result->mixed_fractions();

        return $result;
    }

    // Метод умножения 4-х объектов-дробей.
    public function multiply_4x_fractions(Fraction $fraction1, Fraction $fraction2, Fraction $fraction3){

        return $this->multiply($fraction1)->multiply($fraction2)->multiply($fraction3);
    }

    // Метод деления 2-х объектов-дробей.
    public function divide(Fraction $fraction)
    {
        $numerator = $this->numerator * $fraction->denominator;
        $denominator = $this->denominator * $fraction->numerator;
    
        $result = new Fraction($numerator, $denominator, 0);
    
        $result->simplify();
        $result->mixed_fractions();
    
        return $result;
    }

    // Метод сокращения дроби.
    public function simplify()
    {
        $gcd = $this->gcd($this->numerator, $this->denominator);

        $this->numerator /= $gcd;
        $this->denominator /= $gcd;
    }

    // Нахождение НОД
    private function gcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return abs($a);
    }

    // Метод переделки дроби в смешанную дробь
    public function mixed_fractions()
    {
        $this->integer += intval($this->numerator / $this->denominator);
        $this->numerator %= $this->denominator;
        if ($this->numerator == 0)
            $this->integer = 0;
    }

    // Перевод в строку
    public function toString()
    {
        if ($this->integer != 0) {
            if ($this->numerator != 0)
                return "{$this->integer} {$this->numerator}/{$this->denominator}<br>";
            else
                return "{$this->integer}<br>";
        } else
            return "{$this->numerator}/{$this->denominator}<br>";
    }
}
