<?php
include_once('connect.php');
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
        <h2>Tarefas</h2>

        <div class="container">
            <div class="content">
                <h3>A fazer</h3>

                <div class="item">
                    <strong>Descrição:</strong>texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                </div>

            </div>

            <div class="content">
                <h3>Fazendo</h3>

                <div class="item">
                    <strong>Descrição:</strong>texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                </div>
            </div>

            <div class="content">
                <h3>Pronto</h3>

                <div class="item">
                    <strong>Descrição:</strong>texto <br>
                    <strong>Setor:</strong>texto <br>
                    <strong>Prioridade:</strong>texto <br>
                    <strong>Vinculado a:</strong>texto <br>
                </div>
            </div>
            
        </div>
    </section>

</body>

</html>