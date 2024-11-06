<?php
include_once('connect.php');

/* function insertIntoTable($post, $tableName){
    global $con;

    $columns = array_keys($post);
    $values = array_map(function ($value) use ($con) {
        return "'" . $con->real_escape_string($value) . "'";
    }, array_values($post));

    $columnsList = implode(", ", $columns);
    $valuesList = implode(", ", $values);

    $sql = "INSERT INTO $tableName ($columnsList) VALUES ($valuesList)";

    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Registro cadastrado com sucesso!')</script>";
        return true;
    } else {
        echo "<script>alert('Erro ao cadastrar o registro: " . $con->error . "')</script>";
        return false;
    }
} */


if (!empty($_POST)) {
    $sql = "INSERT INTO task 
    (id_user, description, sector, priority, status) 
    VALUES 
    ('". $_POST['id_user'] ."', '". $_POST['description'] ."', '". $_POST['sector'] ."', '". $_POST['priority'] ."', '". $_POST['status'] ."')";

    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Tarefas cadastrado com sucesso!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

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
            <h2>Cadastro de Tarefas</h2>

            <label>
                <div>Descrição:</div>
                <input type="text" name="description" required>
            </label>

            <label>
                <div>Setor:</div>
                <input type="text" name="sector" required>
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
                    ?> <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                    <?php }
                    } ?>
                </select>
            </label>

            <label>
                <div>Prioridade:</div>
                <select name="priority" required>
                    <option value="">Selecione a prioridade</option>
                    <option value="baixa">Baixa</option>
                    <option value="média">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </label>

            <input type="hidden" name="status" value="pendente">

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </section>

</body>

</html>