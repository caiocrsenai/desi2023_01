<?php
include_once 'config.php';


if(!empty($_POST['name']) && !empty($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (name, email) values (:name, :email);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    if($stmt->execute()){
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
    <title>User</title>
</head>

<body>
    <?php include_once 'includes/navbar.php';?>
   
    <section>
        <form action="" method="POST">
            <h2>Cadastro de Usuários</h2>
            <label for="name">
                <div>Nome:</div>
                <input type="text" name="name" required>
            </label>

            <label for="email">
                <div>Email:</div>
                <input type="email" name="email" required>
            </label>

            <div>
                <button type="submit">Enviar</button>
            </div>

        </form>
    </section>
</body>

</html>