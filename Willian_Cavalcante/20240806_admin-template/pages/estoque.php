<?php
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
        (id, name, quantity, timestamp) 
        VALUES 
        (
            NULL, 
            '" . $_POST['id_product'] . "', 
            '" . $_POST['quantity'] . "', 
            current_timestamp()
        )";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idStock) {
            $action = "alterado";
        }

        echo "<script>alert('Estoque " . $_POST['id_product'] . " " . $action . " com sucesso!')</script>";
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
        <div class="cb-title">Estoque</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="stockForm" name="stockForm" novalidate>
            <label>
                <div class="lbl">Produtos</div>
                <input type="text" name="id_product" value="<?php echo $stockInfos ? $stockInfos->id_product : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Quantidades</div>
                <input type="text" name="quantity" value="<?php echo $stockInfos ? $stockInfos->quantity : '' ?>" required>
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>