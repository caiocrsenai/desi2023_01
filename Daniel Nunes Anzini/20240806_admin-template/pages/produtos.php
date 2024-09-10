<?php
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    if (!empty($_GET['id'])) {
        $idProduct = $_GET['id'];
=======
if (!empty($_GET['id'])) {
    $idProduct = $_GET['id'];
>>>>>>> Stashed changes

    $sql = "DELETE FROM product WHERE product.id = " . $idProduct . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Produto excluido com sucesso!')</script>";
    }
<<<<<<< Updated upstream
=======
if (!empty($_GET['id'])) {
    $idProduct = $_GET['id'];

    $sql = "DELETE FROM product WHERE product.id = " . $idProduct . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Produto excluido com sucesso!')</script>";
    }
}
>>>>>>> Stashed changes
=======
}
>>>>>>> Stashed changes
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
                    $sql = "SELECT * FROM product";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->id_category; ?></td>
                                <td><?php echo $row->price; ?></td>
                                <td>
                                    <a href="?page=produto&id=<?php echo $row->id; ?>" class="btn-status color-blue">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                                     <div class="delete-user btn-status color-red" data-id="<?php echo $row->id; ?>">
                                      <i class="fa-regular fa-trash-can"></i>
                                     </div>
=======
                                    <div class="delete-product btn-status color-red" data-id="<?php echo $row->id; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
>>>>>>> Stashed changes
=======
                                    <div class="delete-product btn-status color-red" data-id="<?php echo $row->id; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    _element.addEventListener('click', function(e){
        const_this = this,
        dataId = this.getAttribute('data-id');
        
        if (confirm ('Voce deseja realmente excluir o produto?')){
        //alert ('Excluir produto: '+ dataId);
        window.location.href ='?page=produtos&id=' + dataId;
    }
    });
        
=======
=======
>>>>>>> Stashed changes
        _element.addEventListener('click', function(e) {
            const _this = this,
                dataId = _this.getAttribute('data-id');

            if (confirm('Você deseja realmente excluir o produto?')) {
                //alert('Excluir usuario: ' + dataId);
                window.location.href = '?page=produtos&id=' + dataId;
            }
        });
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    });
</script>