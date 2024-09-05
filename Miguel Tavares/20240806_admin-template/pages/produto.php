<?php
$idCategory = false;
$categoryInfos = false;

if (!empty($_GET['id'])) {
    $idCategory = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idCategory) {
        $sql = "UPDATE product SET 
        name = '" . $_POST['name'] . "', 
        id_category = '" . $_POST['id_category'] . "', 
        codebar = '" . $_POST['codebar'] . "', 
        price = '" . $_POST['price'] . "' 
        WHERE product.id = ". $idCategory ."
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
        if ($idCategory) {
            $action = "alterado";
        }

        echo "<script>alert('Produto " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
    }
}

if ($idCategory) {
    $sql = "SELECT * FROM product WHERE id = " . $idCategory;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $categoryInfos = $result->fetch_object();
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
                <input type="text" name="name" value="<?php echo $categoryInfos ? $categoryInfos->name : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Categoria</div>
                <input type="text" name="id_category" value="<?php echo $categoryInfos ? $categoryInfos->id_category : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Código de Barras (EAN-13)</div>
                <input type="text" name="codebar" value="<?php echo $categoryInfos ? $categoryInfos->codebar : '' ?>" maxlength="13">
            </label>

            <label>
                <div class="lbl">Preco</div>
                <input type="number" min="0.00" max="10000.00" step="0.10" name="price" value="<?php echo $categoryInfos ? $categoryInfos->price : '' ?>" />
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>