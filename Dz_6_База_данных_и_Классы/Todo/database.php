<?php

define("HOST", "localhost");
define("DATABASE", "todo");
define("PORT", 3306);
define("CHARSET", "utf8mb4");
define("USER", "root");
define("PASSWORD", "");


$pdo = new PDO(
    "mysql:host=" . HOST . ";" .
    "port=" . PORT . ";" .
    "dbname=" . DATABASE . ";" . 
    "charset=" . CHARSET,
    USER, PASSWORD
);

return $pdo;


?>