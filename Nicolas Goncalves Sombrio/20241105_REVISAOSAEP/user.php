<?php
include_once('connect.php');

if (!empty($_POST)) {
    var_dump($_POST);

    $sql = "INSERT INTO user 
    (id, name, email)
    VALUES 
    (NULL, '" . $_POST['name'] . " ', '" . $_POST['email'] . "')";

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idCategory) {
            $action = "alterado";
        }
        echo "<script>alert('Categoria " . $_POST['name'] . " " . $action . " com sucesso!'); window.location.href = '?page=categorias' </script>";
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
            <h2>Cadastros de Usuários</h2>

            <label>
                <div>Nome:</div>
                <input type="text" name="name" required>
            </label>

            <label>
                <div>Email:</div>
                <input type="email" name="email" required>
            </label>

            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>

    </section>

</body>

</html>