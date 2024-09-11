<?php
if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];

    $sql= "DELETE FROM stock WHERE stock.id = ".$idStock .";";

    $result = $con->query($sql);
    if ($con -> affected_rows > 0) {
        echo "<script>alert('Produto do estoque excluído com sucesso!')</script>";
    } 
}

?>
<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Estoque</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th width="10px">Alterar</th>
                        <th width="10px">Excluir</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT stk.id, stk.quantity, pdt.name
                    FROM stock as stk
                    INNER JOIN product as pdt
                    on pdt.id = stk.id_product";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                    ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php ?><?php echo $row->quantity; ?></td>
                                
                                <td>
                                    <a href="?page=estoque&id=<?php echo $row->id; ?>" class="btn-status color-blue ">

                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>

                                <td>
                                    <div class="delete-stock btn-status color-red " data-id="<?php echo $row->id; ?>">
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
    _qsa('.delete-stock').forEach(function(_element){
        _element.addEventListener('click', function(e) {
            const _this = this,
                dataId = _this.getAttribute('data-id');

            if (confirm('Você deseja realmente excluir do estoque?')){
                //alert('Excluir usuario: ' + dataId);
                window.location.href = '?page=estoques&id=' + dataId;
            } 
        });
    });
    

</script>