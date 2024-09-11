<?php
if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];

    $sql = "DELETE FROM product WHERE product.id = " . $idStock . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Estoque!')</script>";
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
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th width="10px">Alterar</th>
                        <th width="10px">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT pro.name, pro.id, pro.price, cat.name AS cat_name
                            FROM product AS pro
                            JOIN category AS cat ON cat.id = pro.id_category";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->cat_name; ?></td>
                                <td><?php echo $row->price; ?></td>
                                <td>
                                    <a href="?page=produto&id=<?php echo $row->id; ?>" class="btn-status color-blue">
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
                window.location.href = '?page=produtos&id=' + dataId;
            }
        });
    });
</script>