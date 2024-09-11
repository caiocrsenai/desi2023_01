<?php
$idStock = false;
$stockInfos = false;

if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idStock) {
        $sql = "UPDATE stock 
        SET 
        id_product = '" . $_POST['id_product'] . "', 
        quantity = '" . $_POST['quantity'] . "' 
        WHERE stock.id = ". $idStock ."";
    } else {
        $sql = "INSERT INTO stock 
        (id_product, quantity) 
        VALUES 
        ( 
        '" . $_POST['id_product'] . "', 
        '" . $_POST['quantity'] . "')";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idStock) {
            $action = "alterado";
        }

        echo "<script>alert('Categoria " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
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
                <div class="lbl">ID Produto</div>
                <select name="id_product">
                    <option selected disabled style="display: none;" value="">Selecione o Produto</option>
                    <?php
                    $sql = "SELECT * FROM product";
                    $result = $con->query($sql);
                    var_dump($result);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {

                            echo '<option value="' . $row->id . '" ' . ($stockInfos ? ($stockInfos ->id_product == $row->id? 'selected' : '') : '') . '>' . $row->name . '</option>';
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Quantidade</div>
                <input type="text" name="quantity" value="<?php echo $stockInfos ? $stockInfos->quantity : '' ?>" required>
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>