<?php

if(!empty($_GET['id'])){
    $idcategory = $_GET['id'];

    $sql = "DELETE FROM category WHERE category.id =". $idcategory.";";
    $result = $con->query($sql);

    if($con->affected_rows > 0){
        echo "<script>alert('categoria excluida com sucesso!');
        window.location.href = '?page=categorias'
        </script>";
    }
}
?>

<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Cadastro de category</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th width="10px">Alterar</th>
                        <th width="10px">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM category";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->description; ?></td>
                                <td>
                                    <a href="?page=categoria&id=<?php echo $row->id; ?>" class="btn-status color-blue">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="delete-category btn-status color-red" data-id="<?php echo $row->id; ?>">
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
    _qsa('.delete-category').forEach(function(_element) {
        _element.addEventListener('click', function(e) {
            const _this = this,
                dataId = this.getAttribute('data-id');
            if (confirm('Você deseja realmente excluir a categoria?')) {
                window.location.href = '?page=categorias&id=' + dataId;
            }
        });
    });
</script>