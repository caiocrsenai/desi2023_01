<?php
    include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>To-do list</title>
</head>
<body>
    <?php
        include_once('header.php');
    ?>
    <section>
       <h2>Tarefas</h2> 

       <div class="container">
            <div class="content">
                <h3>À Fazer</h3>

                <div class="item">
                    <strong>Descrição:</strong>texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                    <button></button>
                </div>
            </div>
            <div class="content">
                <h3>Fazendo</h3>

                <div class="item">
                    <strong>Descrição:</strong>texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                    <button></button>
                </div>
            </div>
            <div class="content">
                <h3>Pronto</h3>

                <div class="item">
                    <strong>Descrição:</strong>texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                    <button></button>
                </div>
            </div>
       </div>
    </section>
</body>
</html>