<?php
include_once 'config.php';



if (!empty($_POST['description']) && !empty($_POST['sector']) && !empty($_POST['user']) && !empty($_POST['priority'])) {
    $description = $_POST['description'];
    $sector = $_POST['sector'];
    $user = $_POST['user'];
    $priority = $_POST['priority'];
    $status = 'pendente';

    $sql = "INSERT INTO task (description, sector, id_user, priority, status) values (:description, :sector, :id_user, :priority, :status);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':sector', $sector);
    $stmt->bindParam(':id_user', $user);
    $stmt->bindParam(':priority', $priority);
    $stmt->bindParam(':status', $status);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastrado com Sucesso!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tarefas</title>
</head>

<body>
    <?php include_once 'includes/navbar.php'; ?>

    <section>
        <form action="" method="POST">
            <h2>Cadastro de Tarefas</h2>
            <label for="name">
                <div>Descrição:</div>
                <input type="text" name="description" required>
            </label>

            <label for="sector">
                <div>Setor:</div>
                <input type="text" name="sector" required>
            </label>

            <label for="user">
                <div>Usuário</div>

                <select name="user">
                    <option value="">Selecione um usuário</option>
                    <?php
                    $sql = 'SELECT * FROM user';
                    $result = $pdo->query($sql);

                    foreach ($result as $row) {
                        echo "<option value=" . $row['ID'] . ">" . $row['name'] . "</option>";
                    }

                    ?>
                </select>
            </label>

            <label for="priority">
                <div>Prioridade:</div>
                <select name="priority">
                    <option value="">Selecione a Prioridade</option>
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </label>

            <div>
                <button type="submit">Enviar</button>
            </div>

        </form>
    </section>
</body>

</html>