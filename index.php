<?php require __DIR__ . '/todo.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container">
    <?php if (array_key_exists('success', $_GET)): ?>
        <?php require __DIR__ . '/components/alert.php';?>
    <?php endif; ?>
    <h1>Todo List</h1>
    <form action="" method="post">
        <input type="text" name="description" id="description">
        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
    </form>

    <h2>Current Tasks</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($tasks as $task):?>
                <tr id="task-info">
                    <td><?= $task['id'] ?></td>
                    <td><?= htmlspecialchars($task['description'])?></td>
                    <td>
                        <?= $task['completed'] ? "True" : "False"; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </table>
    <?php require __DIR__ . '/components/offcanvas.php'; ?>
    <?php require __DIR__ . '/components//confirm-delete.php'; ?>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous"
    >
    </script>
    <script src="assets/js/main.js"></script>
</body>
</html>