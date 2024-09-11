<?php

$idStock = false;
$stockInfos = false;
if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idStock) {
        $sql = "
        UPDATE stock SET 
        id_product = '" . $_POST['id_product'] . "', 
        quantity = '" . $_POST['quantity'] . "'
        WHERE stock.id = ". $idStock ."
        ";
    } else {
        $sql = "INSERT INTO stock (id_product, quantity)
        VALUES 
        (
            '" . $_POST['id_product'] . "', 
            '" . $_POST['quantity'] . "'
        )";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idStock) {
            $action = "alterado";
        }

        $sqlNameProduct = "SELECT name FROM product WHERE id = " . $_POST['id_product'];
        $resultNameProduct = $con->query($sqlNameProduct);
        $nameProductInfos = $resultNameProduct->fetch_object();

        echo "<script>alert('Estoque de " . $nameProductInfos->name . " " . $action . " com sucesso!')</script>";
    }
}

if ($idStock) {
    $sql = "SELECT * FROM stock WHERE id = " . $idStock;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $stockInfos = $result->fetch_object();
    }
}

?>
<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Estoques</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="stockForm" name="Form" novalidate>
            <label>
                <div class="lbl">Produto</div>
                <select name="id_product">
                    <option selected disabled style="display: none;" value="">Selecione o produto</option>
                    <?php
                    $sql = "SELECT * FROM product";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->id  . '" ' . ($stockInfos ? ($stockInfos->id_product == $row->id ? 'selected' : '') : '') . '>' . $row->name  . '</option>:';
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Quantidade</div>
                <input type="text" name="quantity" value="<?php echo $stockInfos ? $stockInfos->quantity : '' ?>">
            </label>
            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>