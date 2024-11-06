<?php
include_once('connect.php');


if (!empty($_POST)) {
    $sql = "INSERT INTO user 
    (name, email) 
    VALUES 
    ('" . $_POST['name'] . "', '" . $_POST['email'] . "')";

    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
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
            <h2>Cadastro de Usuário</h2>

            <label>
                <div>Nome:</div>
                <input type="text" name="name" required>
            </label>

            <label>
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