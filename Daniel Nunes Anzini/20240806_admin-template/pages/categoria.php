<?php
<<<<<<< Updated upstream
$idCategory = false;
$categoryInfos = false;

if (!empty($_GET['id'])) {
    $idCategory = $_GET['id'];
=======
$idProduct = false;
$productInfos = false;

if (!empty($_GET['id'])) {
    $idProduct = $_GET['id'];
>>>>>>> Stashed changes
}

if (!empty($_POST)) {

<<<<<<< Updated upstream
    if ($idCategory) {
        $sql = "UPDATE category SET 
        name = '" . $_POST['name'] . "', 
        description = '" . $_POST['description'] . "' 
        WHERE category.id = ".$idCategory."";
    } else {
        $sql = "INSERT INTO category 
        (id, name, description, timestamp) 
        VALUES 
        (
            NULL, 
            '" . $_POST['name'] . "', 
            '" . $_POST['description'] . "', 
            current_timestamp()
        )";
=======
    if ($idProduct) {
        $sql = "UPDATE product SET 
        name = '" . $_POST['name'] . "', 
        id_category = '" . $_POST['id_category'] . "', 
        codebar = '" . $_POST['codebar'] . "', 
        price = '" . $_POST['price'] . "' 
        WHERE product.id = ". $idProduct ."
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
>>>>>>> Stashed changes
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
<<<<<<< Updated upstream
        if ($idCategory) {
            $action = "alterado";
        }

        echo "<script>alert('Categoria " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
    }
}

if ($idCategory) {
    $sql = "SELECT * FROM category WHERE id = " . $idCategory;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $categoryInfos = $result->fetch_object();
=======
        if ($idProduct) {
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
>>>>>>> Stashed changes
    }
}

?>
<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
<<<<<<< Updated upstream
        <div class="cb-title">Categoria</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="categoryForm" name="categoryForm" novalidate>
            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" value="<?php echo $categoryInfos ? $categoryInfos->name : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Descrição</div>
                <input type="text" name="description" value="<?php echo $categoryInfos ? $categoryInfos->description : '' ?>" required>
=======
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
                <input type="text" name="id_category" value="<?php echo $productInfos ? $productInfos->id_category : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Código de Barras (EAN-13)</div>
                <input type="text" name="codebar" value="<?php echo $productInfos ? $productInfos->codebar : '' ?>" maxlength="13">
            </label>

            <label>
                <div class="lbl">Preco</div>
                <input type="number" min="0.00" max="10000.00" step="0.10" name="price" value="<?php echo $productInfos ? $productInfos->price : '' ?>" />
>>>>>>> Stashed changes
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>