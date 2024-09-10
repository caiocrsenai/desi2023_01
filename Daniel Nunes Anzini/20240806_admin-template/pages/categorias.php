<?php
if (!empty($_GET['id'])) {
<<<<<<< Updated upstream
    $idCategory = $_GET['id'];

    $sql = "DELETE FROM category WHERE category.id = " . $idCategory . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Categoria excluido com sucesso!')</script>";
=======
    $idProduct = $_GET['id'];

    $sql = "DELETE FROM product WHERE product.id = " . $idProduct . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Produto excluido com sucesso!')</script>";
>>>>>>> Stashed changes
    }
}
?>

<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Produtos</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
<<<<<<< Updated upstream
                        <th>Descrição</th>
=======
                        <th>Categoria</th>
                        <th>Preço</th>
>>>>>>> Stashed changes
                        <th width="10px">Alterar</th>
                        <th width="10px">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
<<<<<<< Updated upstream
                    $sql = "SELECT * FROM category";
=======
                    $sql = "SELECT * FROM product";
>>>>>>> Stashed changes
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
<<<<<<< Updated upstream
                                <td><?php echo $row->description; ?></td>
                                <td>
                                    <a href="?page=categoria&id=<?php echo $row->id; ?>" class="btn-status color-blue">
=======
                                <td><?php echo $row->id_category; ?></td>
                                <td><?php echo $row->price; ?></td>
                                <td>
                                    <a href="?page=produto&id=<?php echo $row->id; ?>" class="btn-status color-blue">
>>>>>>> Stashed changes
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="delete-product btn-status color-red" data-id="<?php echo $row->id; ?>">
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
    _qsa('.delete-product').forEach(function(_element) {
        _element.addEventListener('click', function(e) {
            const _this = this,
                dataId = _this.getAttribute('data-id');

            if (confirm('Você deseja realmente excluir o produto?')) {
                //alert('Excluir usuario: ' + dataId);
<<<<<<< Updated upstream
                window.location.href = '?page=categorias&id=' + dataId;
=======
                window.location.href = '?page=produtos&id=' + dataId;
>>>>>>> Stashed changes
            }
        });
    });
</script>