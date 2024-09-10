<?php
    if (!empty($_GET['id'])) {
        $idUser = $_GET['id'];

    $sql = "DELETE FROM user WHERE user.id = " . $idUser . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Usuário excluido com sucesso!')</script>";
    }
}
    
?>

<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Usuarios</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th width="10px">Alterar</th>
                        <th width="10px">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td>
                                    <a href="?page=usuario&id=<?php echo $row->id; ?>" class="btn-status color-blue">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="delete-user btn-status color-red" data-id="<?php echo $row->id; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    _qsa('.delete-user').forEach(function(_element){
        _element.addEventListener('click', function(e){
            const _this = this,
                dataId = _this.getAttribute('data-id');
            if (confirm('Você deseja realmente excluir o usuário?')) {
                alert('Excluir usuario: ' + dataId);
                window.location.href = '?page=usuarios&id=' + dataId ;
            }
        });
    });
    
    
    
</script>
                