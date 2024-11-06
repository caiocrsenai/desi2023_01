<?php
include_once('connect.php');

if (!empty($_POST)) {
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
     current_timestamp())";

    $result =  $con->query($sql);
    if ($result) {
        echo "<script>alert('usuario recebido com sucesso!')</script>";
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

    <section>
        <form action="" method="POST">

            <h2>cadastro de cadastro de tarefas</h2>
            <label>
                <div>Descrição:</div>
                <input type="text" name="description" require>
            </label>
            <label>
                <div>Setor:</div>
                <input type="text" name="sector" require>
            </label>
            <label>
                <div>Usuario:</div>
                <select name="id_user" required>
                    <option value="">selecione o usuário</option>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {

                    ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div>Prioridade:</div>
                <select name="priority" required>
                    <option value="">selecione o a prioridade</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </label>

            <input type="hidden" name="status" value="pendente">
            <div>
                <button type="submit">enviar</button>
            </div>
        </form>
    </section>

</body>

</html>