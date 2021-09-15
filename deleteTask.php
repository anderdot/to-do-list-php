<?php
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$arrTasks = json_decode(file_get_contents('tasks.json'), true);

$task = $_POST['task'];
unset($arrTasks[$task]);

file_put_contents('tasks.json', json_encode($arrTasks, JSON_PRETTY_PRINT));

header('Location: index.php');
