<?php
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$TaskColor = $_POST['color'];
$task = $_POST['inputTask'] ?? '';
$task = trim($task);

if ($task) {
    if (file_exists('tasks.json')) {
        $tasks = file_get_contents('tasks.json');
        $arrTasks = json_decode($tasks, true);
    } else {
        $arrTasks = [];
    }

    $arrTasks[$task] = ['color' => $TaskColor];
    file_put_contents('tasks.json', json_encode($arrTasks, JSON_PRETTY_PRINT));
}

header('Location: index.php');
