<?php
$idProduct = false;
$productInfos = false;

if (!empty($_GET['id'])) {
    $idProduct = $_GET['id'];
<<<<<<< Updated upstream
<<<<<<< Updated upstream
 
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
}

if (!empty($_POST)) {

    if ($idProduct) {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        $sql =  "
        UPDATE product SET 
=======
        $sql = "UPDATE product SET 
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        '". $_POST ['name'] ."',
        '". $_POST ['id_category'] ."',
        '". $_POST ['codebar'] ."',
        '". $_POST ['price'] ."'
=======
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
=======
>>>>>>> Stashed changes
            '" . $_POST['name'] . "',
            '" . $_POST['id_category'] . "',
            '" . $_POST['codebar'] . "',
            '" . $_POST['price'] . "'
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
        )
        ";
    }

    $result = $con->query($sql);

<<<<<<< Updated upstream
<<<<<<< Updated upstream
    if ($result) {      
        $action = 'cadastrado';
        if ($idProduct){
            $action = "alterado";   
        }
        echo "<script>alert('Produto " . $_POST['name'] . " " .$action. " com sucesso!')</script>";
=======
    if ($result) {
        $action = "cadastrado";
        if ($idProduct) {
            $action = "alterado";
        }

        echo "<script>alert('Produto " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
>>>>>>> Stashed changes
=======
    if ($result) {
        $action = "cadastrado";
        if ($idProduct) {
            $action = "alterado";
        }

        echo "<script>alert('Produto " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <input type="text" name="name" value="<?php echo $productInfos ? $productInfos->name : '' ?>"required>
=======
                <input type="text" name="name" value="<?php echo $productInfos ? $productInfos->name : '' ?>" required>
>>>>>>> Stashed changes
            </label>

            <label>
                <div class="lbl">Categoria</div>
                <input type="text" name="id_category" value="<?php echo $productInfos ? $productInfos->id_category : '' ?>" required>
            </label>
=======
                <input type="text" name="name" value="<?php echo $productInfos ? $productInfos->name : '' ?>" required>
            </label>

           <label>
                <div class="lbl">Categoria</div>
                <select name='id_category' required>
                    <option value=''>Selecione</option>

                    <?php
                    $sql = "SELECT * FROM category";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            ?> <option value='<?php echo $row->id; ?>'><?php echo $row->name; ?></option>

                            <?php

                        }
                    }
                    ?>
                </select>
             </label>
>>>>>>> Stashed changes

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