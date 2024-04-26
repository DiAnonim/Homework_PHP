<?php

class Task
{

    private static $db;
    private $todo_id;
    private $title;
    private $createdAt;
    private $completed;

    public static function set_PDO($pdo)
    {
        self::$db = $pdo;
    }

    public function getId()
    {
        return $this->todo_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function set_title($new_title)
    {
        if ($new_title !== $this->title) {
            $sql = "UPDATE task SET title = :title WHERE todo_id = :todo_id";
            $res = self::$db->prepare($sql);
            $res->execute(['title' => $new_title, 'todo_id' => $this->todo_id]);

            if ($res) {
                $this->title = $new_title;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }   

    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
    }

    public function getInfo()
    {
        return "ID: " . $this->todo_id . "<br>" . " Title: " . $this->title . "<br>" . " CreatedAt: " . $this->createdAt . "<br>";
    }

    public static function create_task_in_bd($title, $completed)
    {
        $createdAt = date('Y-m-d');
        $sql = "INSERT INTO task(title, createdAt, completed) VALUES (:title, :createdAt, :completed)";
        $res = self::$db->prepare($sql);
        $res->execute(['title' => $title, 'createdAt' => $createdAt, 'completed' => $completed]);
        if ($res) {
            $todo_id = self::$db->lastInsertId();
            return $todo_id;
        } else
            return 0;

    }

    public static function delete_task_in_bd($todo_id){
        $sql = "DELETE FROM task WHERE todo_id = :todo_id";
        $res = self::$db->prepare($sql);
        $res->execute(['todo_id' => $todo_id]);
        if ($res)
            return true;
        else
            return false;
    }

    public static function done_task_in_bd($todo_id){
        $sql = "UPDATE task SET completed = 1 WHERE todo_id = :todo_id";
        $res = self::$db->prepare($sql);
        $res->execute(['todo_id' => $todo_id]);
        if ($res) return true;
        else return false;
    }
}

?>