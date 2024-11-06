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

    <h2>Tarefas</h2>
    <section>
        <div class="container">
            <div class="content">
                <h3>À Fazer</h3>
                <div class="item">
                    <strong>Descrição:</strong> texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                    <button></button>
                </div>
            </div>
            <div class="content">
                <h3>Fazendo</h3>
            </div>
            <div class="content">
                <h3>Pronto</h3>
            </div>
        </div>
    </section>
</body>

</html>