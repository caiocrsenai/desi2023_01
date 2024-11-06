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

    <section>
        <h2>tarefas</h2>
        <div class="container">
            <div class="content">
                <h3>a fazer </h3>

                <div class="item">
                 <strong>Descrição:</strong> texto<br>
                 <strong>Setor:</strong> texto<br>
                 <strong>Prioridade:</strong> texto<br>
                 <strong>Vinculado A:</strong> texto<br>
                 
            </div>
            </div>
            
            <div class="content">
                <h3> fazendo </h3>
                <div class="item">
                 <strong>Descrição:</strong> texto<br>
                 <strong>Setor:</strong> texto<br>
                 <strong>Prioridade:</strong> texto<br>
                 <strong>Vinculado A:</strong> texto<br>
                 
            </div>
            </div>
            <div class="content">
                <h3>pronto</h3>
                <div class="item">
                 <strong>Descrição:</strong> texto<br>
                 <strong>Setor:</strong> texto<br>
                 <strong>Prioridade:</strong> texto<br>
                 <strong>Vinculado A:</strong> texto<br>
                 
            </div>
            </div>
        </div>
    </section>

</body>

</html>