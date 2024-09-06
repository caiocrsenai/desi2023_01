<?php
$idProduct = false;
$productInfos = false;

if (!empty($_GET['id'])) {
    $idProduct = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idProduct) {
        $sql = "UPDATE product SET 
        name = '" . $_POST['name'] . "', 
        id_category = '" . $_POST['id_category'] . "', 
        codebar = '" . $_POST['codebar'] . "',
        price = '" . $_POST['price'] . "' 
        WHERE product.id = " . $idProduct . "
        ";
    } else {
        $sql = "INSERT INTO product 
        (name, id_category, codebar, price) 
        VALUES 
        (
            '" . $_POST['name'] . "', 
            '" . $_POST['id_category'] . "', 
            '" . $_POST['codebar'] . "', 
            '" . $_POST['price'] . "' 
        )
        ";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if($idProduct){
            $action = "alterado";
        }

        echo "<script>alert('Produto " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
    }
}

if ($idProduct) {
    $sql = "SELECT * FROM product WHERE id = " . $idProduct;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $productInfos = $result->fetch_object();
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
                <div class="lbl">Nome</div>
                <input type="text" name="name" value="<?php echo $productInfos ? $productInfos->name : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Categoria</div>
                <select name="id_category">
                    <option selected disabled style="display: none;" value="">Selecione a categoria</option>
                    <?php
                    $sql = "SELECT * FROM category";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->id . '" ' . ($productInfos ? ($productInfos->id_category == $row->id? 'selected' : '') : '') . '>' . $row->name . '</option>';
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Código de Barras (EAN-13)</div>
                <input type="text" name="codebar" value="<?php echo $productInfos ? $productInfos->codebar : '' ?>" maxlength="13">
            </label>

            <label>
                <div class="lbl">Preco</div>
                <input type="number" min="0.00" max="10000.00" step="0.10" name="price" value="<?php echo $productInfos ? $productInfos->price : '' ?>" />
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>