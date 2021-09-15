<?php
echo '<pre>';
var_dump($_POST);
echo '</pre>';

$tasks = file_get_contents('tasks.json');
$arrTasks = json_decode($tasks, true);

$task = $_POST['task'];
unset($arrTasks[$task]);

file_put_contents('tasks.json', json_encode($arrTasks, JSON_PRETTY_PRINT));

header('Location: index.php');