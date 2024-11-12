<?php
include_once('connect.php');

if (!empty($_POST)) {
    $sql_user = "INSERT INTO user 
    (id_user, name_user, email_user) 
    VALUES 
    (NULL, '" . $_POST['name_user'] . "', '" . $_POST['email_user'] . "')";

    $result_user = $con->query($sql_user);

    if ($result_user) {
        echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
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
            <h2>Cadastro de Usuário</h2>

            <label>
                <div>Nome:</div>
                <input type="text" name="name_user" required>
            </label>

            <label>
                <div>Email:</div>
                <input type="email" name="email_user" required>
            </label>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </section>

</body>

</html>