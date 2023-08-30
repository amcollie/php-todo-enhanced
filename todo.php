<?php

declare(strict_types=1);

use PDO;

$pdo = new PDO('sqlite:db/tasks.db');


if ($_POST['add'] === 'add') {
    if (!array_key_exists('description', $_POST) || empty(trim($_POST['description']))) {
        header('Location: index.php?success=false&message=Please provide a description');
    }

    $description = htmlspecialchars($_POST['description']);
    
    $stmt = $pdo->prepare('INSERT INTO tasks (description) VALUES (:description)');
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->execute();
    
    header('Location: index.php?success=true&message=Task added successfully');
} else if ($_POST['completed'] === 'completed') {
    if (!array_key_exists('completed', $_POST) || empty(trim($_POST['completed']))) {
        header('Location: index.php?success=false&message=Please provide a value for completed');
    }
    
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id === false) {
        header('Location: index.php?success=false&message=Not a valid id');
    }
    
    $completed = true;
    $stmt = $pdo->prepare('UPDATE tasks SET completed = :completed WHERE id = :id;');
    $stmt->bindParam(':completed', $completed, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: index.php?success=true&message=Task with ID $id successfully completed");
} else if ($_POST['deleted']) {
    if (!array_key_exists('id', $_POST) || empty(trim($_POST['id']))) {
        header('Location: index.php?success=false&message=Please provide an id');
    }
    
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id === false) {
        header('Location: index.php?success=false&message=Not a valid id');
    }
    
    $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: index.php?success=true&message=Task with ID $id deleted successfully");
} else if ($_POST['updated']) {
    var_dump($_POST['updated']);
    var_dump($_POST);
    if (!array_key_exists('id', $_POST) || empty(trim($_POST['id']))) {
        header('Location: index.php?success=false&message=Please provide an id');
    }
    
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id === false) {
        header('Location: index.php?success=false&message=Not a valid id');
    }

    if (!array_key_exists('description', $_POST) || empty(trim($_POST['description']))) {
        header('Location: index.php?success=false&message=Please provide a description');
    }

    $description = htmlspecialchars($_POST['description']);

    if (!array_key_exists('completed', $_POST)) {
        $completed = false;
    } else {
        $completed = filter_input(INPUT_POST, 'completed', FILTER_VALIDATE_BOOLEAN);
    }

    $stmt = $pdo->prepare('UPDATE tasks SET description = :description, completed = :completed WHERE id = :id;');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':completed', $completed, PDO::PARAM_BOOL);
    $stmt->execute();

    header("Location: index.php?success=true&message=Task with ID $id updated successfully");
}

$stmt = $pdo->query('SELECT * FROM tasks ORDER BY id DESC');
$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);