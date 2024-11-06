<?php
include_once('connect.php');

if (!empty($_POST)) {
    $sql = "INSERT INTO user 
     (id, name, email) 
     VALUES 
     (NULL, '" . $_POST['name'] . "', '" . $_POST['email'] . "')";

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

            <h2>cadastro de usuarios</h2>
            <label>
                <div>Nome:</div>
                <input type="text" name="name" require>
            </label>
            <label>

                <div>Email:</div>
                <input type="email" name="email" require>
            </label>

            <div>
                <button type="submit">enviar</button>
            </div>
        </form>
    </section>

</body>

</html>