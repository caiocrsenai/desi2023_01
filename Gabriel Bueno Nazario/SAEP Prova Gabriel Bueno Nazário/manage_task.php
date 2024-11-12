<?php
include_once('connect.php');

if (!empty($_GET) && !empty($_GET['action'])) {
    $id = $_GET['id'];

    if ($_GET['action'] == 'delete') {
        $sqlDelete = "DELETE FROM task WHERE id_task = " . $id . ";";

        $resultDelete = $con->query($sqlDelete);
        if ($con->affected_rows > 0) {
            echo "<script>alert('Tarefa excluida com sucesso!')</script>";
        }
    }

    if ($_GET['action'] == 'changeStatus') {
        $status = $_GET['status_task'];
        $sqlStatus = "UPDATE task SET status_task = '" . $status . "' WHERE id_task = '" . $id . "';";

        $resultStatus = $con->query($sqlStatus);
        if ($con->affected_rows > 0) {
            echo "<script>alert('Status alterado com sucesso!')</script>";
        }
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
        <h2>Tarefas</h2>

        <div class="container">
            <div class="content">
                <h3>A fazer</h3>
                <?php
                $sql = "SELECT * FROM task WHERE status_task = 'fazer'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {

                        $sqlUser = "SELECT name_user FROM user WHERE id_user = '" . $row->id_user . "'";
                        $resultUser = $con->query($sqlUser);
                        $user = $resultUser->fetch_object();
                ?>
                        <div class="item">
                            <strong>Descrição:</strong> <?php echo $row->description_task; ?><br>
                            <strong>Setor:</strong> <?php echo $row->sector_task; ?><br>
                            <strong>Prioridade:</strong> <?php echo $row->priority_task; ?><br>
                            <strong>Vinculado a:</strong> <?php echo $user->name_user; ?><br>

                            <div class="action-buttons">
                                <a href="task.php?id=<?php echo $row->id_task; ?>">
                                    <button>Editar</button>
                                </a>
                                <button class="delete" data-id="<?php echo $row->id_task; ?>">Excluir</button>
                            </div>

                            <div class="select-status">
                                <select>
                                    <option value="fazer" selected>A fazer</option>
                                    <option value="andamento">Em andamento</option>
                                    <option value="concluido">Concluído</option>
                                </select>
                                <button class="change-status" data-id="<?php echo $row->id_task; ?>">Alterar Status</button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="content">
                <h3>Fazendo</h3>
                <?php
                $sql = "SELECT * FROM task WHERE status_task = 'andamento'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {

                        $sqlUser = "SELECT name_user FROM user WHERE id_user = '" . $row->id_user . "'";
                        $resultUser = $con->query($sqlUser);
                        $user = $resultUser->fetch_object();
                ?>
                        <div class="item">
                            <strong>Descrição:</strong> <?php echo $row->description_task; ?><br>
                            <strong>Setor:</strong> <?php echo $row->sector_task; ?><br>
                            <strong>Prioridade:</strong> <?php echo $row->priority_task; ?><br>
                            <strong>Vinculado a:</strong> <?php echo $user->name_user; ?><br>

                            <div class="action-buttons">
                                <a href="task.php?id=<?php echo $row->id_task; ?>">
                                    <button>Editar</button>
                                </a>
                                <button class="delete" data-id="<?php echo $row->id_task; ?>">Excluir</button>
                            </div>

                            <div class="select-status">
                                <select>
                                    <option value="fazer">A fazer</option>
                                    <option value="andamento" selected>Em andamento</option>
                                    <option value="concluido">Concluído</option>
                                </select>
                                <button class="change-status" data-id="<?php echo $row->id_task; ?>">Alterar Status</button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="content">
                <h3>Pronto</h3>
                <?php
                $sql = "SELECT * FROM task WHERE status_task = 'concluido'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {

                        $sqlUser = "SELECT name_user FROM user WHERE id_user = '" . $row->id_user . "'";
                        $resultUser = $con->query($sqlUser);
                        $user = $resultUser->fetch_object();
                ?>
                        <div class="item">
                            <strong>Descrição:</strong> <?php echo $row->description_task; ?><br>
                            <strong>Setor:</strong> <?php echo $row->sector_task; ?><br>
                            <strong>Prioridade:</strong> <?php echo $row->priority_task; ?><br>
                            <strong>Vinculado a:</strong> <?php echo $user->name_user; ?><br>

                            <div class="action-buttons">
                                <a href="task.php?id=<?php echo $row->id_task; ?>">
                                    <button>Editar</button>
                                </a>
                                <button class="delete" data-id="<?php echo $row->id_task; ?>">Excluir</button>
                            </div>

                            <div class="select-status">
                                <select>
                                    <option value="fazer">A fazer</option>
                                    <option value="andamento">Em andamento</option>
                                    <option value="concluido" selected>Concluído</option>
                                </select>
                                <button class="change-status" data-id="<?php echo $row->id_task; ?>">Alterar Status</button>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.delete').forEach(function(_button) {
            _button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                if (confirm('Você deseja remover o item?')) {
                    window.location.href = 'manage_task.php?id=' + id + '&action=delete';
                }
            });
        });

        document.querySelectorAll('.change-status').forEach(function(_button) {
            _button.addEventListener('click', function() {
                var id = this.getAttribute('data-id'),
                    _item = this.closest('.item'),
                    _select = _item.querySelector('select'),
                    newStatus = _select.selectedOptions[0];

                if (confirm('Você deseja alterar o status para ' + newStatus.innerText + '?')) {
                    window.location.href = 'manage_task.php?id=' + id + '&action=changeStatus&status_task=' + newStatus.value;
                }
            });
        });
    </script>

</body>

</html>