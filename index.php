<?php
$tasks = [];
if (file_exists('tasks.json')) {
    $tasks = json_decode(file_get_contents('tasks.json'), true);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">

    <title>Meus afazeres</title>
</head>

<body>
    <header>
        <span class="material-icons">
            <img src="img/outline_assignment_turned_in_white_24dp.png" width="64px" height="64">
        </span>
        <p class="title">Meus afazeres</p>
    </header>

    <form class="form" action="newTask.php" method="post">
        <div class="form-row">
            <div class="form-group">
                <input type="text" class="form-control" name="inputTask" id="inputTask" placeholder="Sua tarefa">
                <input type="hidden" name="color" value="<?php echo random_int(0, 5); ?>">
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary">Criar</button>
            </div>

        </div>
    </form>

    <?php
    $color = array(
        0 => "primary",
        1 => "secondary",
        2 => "success",
        3 => "danger",
        4 => "warning",
        5 => "info"
    );

    foreach ($tasks as $task => $tasks) : ?>
        <form action="deleteTask.php" method="post" class="formTasks">
            <div class="alert alert-<?php echo $color[$tasks['color']]; ?>" role="alert" type="submit">
                <?php echo $task ?>
                <input type="hidden" name="task" value="<?php echo $task ?>">
                <button type="submit" class="btn btn-primary check">✓</button>
            </div>
        </form>
    <?php endforeach ?>
</body>

</html>