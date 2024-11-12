<?php
include_once('connect.php');

$id = !empty($_GET) && !empty($_GET['id']) ? $_GET['id'] : false;

if (!empty($_POST)) {

    if ($id) {
        $sql_task = "UPDATE task SET 
        id_user = '" . $_POST['id_user'] . "', 
        description_task = '" . $_POST['description_task'] . "', 
        sector_task = '" . $_POST['sector_task'] . "', 
        priority_task = '" . $_POST['priority_task'] . "'
        WHERE task.id_task = '" . $id . "'
        ";
    } else {
        $sql_task = "INSERT INTO task
        (id_task, id_user, description_task, sector_task, priority_task, status_task, timestamp)
        VALUES
        (
        NULL, 
        '" . $_POST['id_user'] . "', 
        '" . $_POST['description_task'] . "', 
        '" . $_POST['sector_task'] . "', 
        '" . $_POST['priority_task'] . "', 
        '" . $_POST['status_task'] . "', 
        current_timestamp()
        )";
    }

    $result_task = $con->query($sql_task);

    if ($result_task) {
        echo "<script>alert('Tarefa " . ($id ? 'alterada' : 'cadastrada') . " com sucesso!')</script>";
        header("Location: manage_task.php");
    }
}

if ($id) {
    $sqlTask = "SELECT * FROM task WHERE id_task = '" . $id . "'";
    $resultTask = $con->query($sqlTask);
    $task = $resultTask->fetch_object();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <?php
    include_once('header.php');
    ?>

    <section>
        <form action="" method="POST">
            <h2><?php echo $id ? 'Alterar' : 'Cadastrar'; ?> Tarefas</h2>

            <label>
                <div>Descrição:</div>
                <input type="text" name="description_task" value="<?php echo ($id) ? $task->description_task : ''; ?>" required>
            </label>

            <label>
                <div>Setor:</div>
                <input type="text" name="sector_task" value="<?php echo ($id) ? $task->sector_task : ''; ?>" required>
            </label>

            <label>
                <div>Usuário:</div>
                <select name="id_user" required>
                    <option value="">Selecione o usuário</option>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <option value="<?php echo $row->id_user; ?>" <?php echo ($id && $task->id_user == $row->id_user) ? 'selected' : ''; ?>><?php echo $row->name_user; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div>Prioridade:</div>
                <select name="priority_task" required>
                    <option value="">Selecione a prioridade</option>
                    <option value="baixa" <?php echo ($id && $task->priority_task == 'baixa') ? 'selected' : '' ?>>Baixa</option>
                    <option value="média" <?php echo ($id && $task->priority_task == 'média')  ? 'selected' : '' ?>>Média</option>
                    <option value="alta" <?php echo ($id && $task->priority_task == 'alta') ? 'selected' : '' ?>>Alta</option>
                </select>
            </label>

            <?php if (!$id) { ?>
                <input type="hidden" name="status_task" value="fazer">
            <?php } ?>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </section>

</body>

</html>