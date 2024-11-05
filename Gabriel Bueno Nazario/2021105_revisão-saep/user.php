<?php 
include_once('connect.php');
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

    <header>
        <h1 class="title">Gerenciamento de Tarefas</h1>

        <nav class="menu">
            <a href="user.php">Cadastro de usuários</a>
            <a href="task.php">Cadastro de tarefas</a>
            <a href="manage_task.php">Gerenciamento de tarefas</a>
        </nav>
    </header>

    <section>
        <form>
            <h2>Cadastro de Usuário</h2>

            <label>
                <div>Nome:</div>
                <input type="text" name="name">
            </label>

            <label>
                <div>Email:</div>
                <input type="email" name="email">
            </label>

            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </section>

</body>

</html>