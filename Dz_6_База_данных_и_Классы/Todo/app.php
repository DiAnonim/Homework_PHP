<?php
$pdo = require_once "database.php";
require_once "Todo.php";
Task::set_PDO($pdo);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['task'])) {
        Task::create_task_in_bd($_POST['task'], $_POST['completed']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST["delete_id"])) {
        Task::delete_task_in_bd($_POST["delete_id"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["done_id"])) {
        Task::done_task_in_bd($_POST["done_id"]);
    }
}

?>