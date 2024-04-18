<?php ini_set("display_errors", 1); ?>



<?php
    require_once 'Fraction.php';

    $a = new Fraction(1, 2);
    $b = new Fraction(3, 4);
    $c = new Fraction(5, 6);
    $f = new Fraction(2,3);

    $d = $a->sum_3x_fractions($b, $c);
    // $d = $b->sum($c);

    $e = $b->subtract($a);

    $g = $a->multiply_4x_fractions($f, $b, $c);

    $h = $c->divide($a);

    echo $d->toString();
    echo $e->toString();
    echo $g->toString();
    echo $h->toString();


?>