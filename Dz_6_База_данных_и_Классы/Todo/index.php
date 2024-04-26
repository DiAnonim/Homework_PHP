<?php require_once 'app.php';

$sql = "SELECT * FROM task WHERE completed = 0";
$tasks = $pdo->query($sql);
$res = $tasks->fetchAll(PDO::FETCH_CLASS, "Task");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input required minlength="1" type="text" name="task" placeholder="New task">
        <select name="completed">
            <option value="0">Not completed</option>
            <option value="1">Completed</option>
        </select>
        <button type="submit">Add</button>
    </form>
    

    <section>
        <h2>Tasks</h2>
        <ul>
            <?php foreach ($res as $task): ?>
                <li>
                    <p><?= $task->getTitle() ?></p>
                    <form action="" method="post">
                        <input type="hidden" name="delete_id" value="<?= $task->getId() ?>">
                        <button type="submit">Delete</button>
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="done_id" value="<?= $task->getId() ?>">
                        <button type="submit">Done</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <?php

    $sql = "SELECT * FROM task WHERE completed = 1";
    $tasks = $pdo->query($sql);
    $res = $tasks->fetchAll(PDO::FETCH_CLASS, "Task");
    
    ?>

    <section>
        <h2>Done Tasks</h2>
        <ul>
            <?php foreach ($res as $task): ?>
                <li>
                    <p><?= $task->getTitle() ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>

</html>