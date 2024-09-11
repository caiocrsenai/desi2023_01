<?php
//var_dump($_POST);
$idStock = false;
$stockInfos = false;

if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];
}


if (!empty($_POST)) {

    if ($idStock) {
        $sql = "UPDATE stock SET 
        id_product = '" . $_POST['id_product'] . "', 
        quantity = '" . $_POST['quantity'] . "'        
        WHERE stock.id = " . $idStock . "";
    } else {
        $sql = "INSERT INTO stock 
        (id_product, quantity)
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

        echo "<script>alert('Estoque " . $_POST['id_product'] . "  " . $action . " com sucesso!')</script>";
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
        <div class="cb-title">Categoria</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="stockForm" name="stockForm" novalidate>
            <label>
                <div class="lbl">Estoque</div>
                <select name='id_product' required>
                    <option value=''>Selecione</option>

                    <?php
                    $sql = "SELECT * FROM product";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            //$selected = ($row->id == $productInfos->id_category) ? 'selected' : '';
                            if ($row->id == $stockInfos->id_product) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                    ?>
                            <option value='<?php echo $row->id; ?>' <?php echo $selected; ?>><?php echo $row->name; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Quantidade</div>
                <input type="text" name="quantity" value="<?php echo  $stockInfos ? $stockInfos->quantity : '' ?>" required>
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>
</div>