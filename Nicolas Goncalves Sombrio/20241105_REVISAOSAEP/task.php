<?php
include_once('connect.php');

if (!empty($_POST)) {
    var_dump($_POST);
    

    $sql = "INSERT INTO task 
    (id, id_user, description, sector, priority, status, timestamp) 
    VALUES 
    (
    NULL,
     '" . $_POST['id_user'] . "',
     '" . $_POST['description'] . "',
     '" . $_POST['sector'] . "',
     '" . $_POST['priority'] . "',
     '" . $_POST['status'] . "',
     current_timestamp()
     )";

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idCategory) {
            $action = "alterado";
        }
        echo "<script>alert('Tarefa cadastrada com sucesso'); </script>";
    }
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


    <section class="main-content">
        <form action="" method="POST">
            <h2>Cadastros de Tarefas</h2>

            <label>
                <div>Descrição:</div>
                <input type="text" name="description" required>
            </label>

            <label>
                <div>Setor:</div>
                <input type="text" name="sector" required>
            </label>

            <label>
                <div>Usuario:</div>
                <select name="id_user" required>
                    <option value="">Selecione o Usuário</option>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <option value="<?php echo $row->id; ?>">
                                <?php echo $row->name; ?>
                            </option>
                    <?php

                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div>Prioridade:</div>
                <select name="priority" required>
                    <option value="">Selecione a Prioridade</option>
                    <option value="baixa">Baixa</option>
                    <option value="média">Media</option>
                    <option value="alta">Alta</option>
                </select>
            </label>

            <input type="hidden" name="status" value="pendente">

            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>

    </section>

</body>

</html>