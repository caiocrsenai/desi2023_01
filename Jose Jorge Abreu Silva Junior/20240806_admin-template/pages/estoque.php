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
        WHERE stock.id = ". $idStock ."
        ";
    } else {
        $sql = 
        "INSERT INTO estoque 
        (id, id_product, quantity, timestamp)
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

        echo "<script>alert('Estoque " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
    }
}

if ($idStock) {
    $sql = "SELECT * FROM product WHERE id = " . $idStock;
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $stockInfos = $result->fetch_object();
    }
}



?>
<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Produtos</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="productForm" name="productForm" novalidate>

            <label>
                <div class="lbl">Produto</div>
                <select name="id_product" required>
                    <option value=''>Selecione</option>
                    <?php
                        $sql = "SELECT id, name FROM product";
                        $produtos = $con->query($sql);
                        while ($row = $produtos->fetch_object()) {
                            $selected = ($stockInfos->id_product == $row->id) ? 'selected' : '';
                            echo '<option '.  $selected .' value="' . $row->id . '">' . $row->name . '</option>';
                        }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Quantidade</div>
                <input type="text" name="quantity" value="<?php echo $stockInfos ? $stockInfos->quantity : '' ?>" maxlength="13">
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>