<?php
$idProduct = false;
$userInfos = false;

if (!empty($_GET['id'])) {
    $idProduct = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idProduct) {
        $sql = "";
    } else {
        $sql = "
        INSERT INTO product 
        (name, id_category, codebar, price) 
        VALUES 
        (
            '". $_POST['name'] ."', 
            '". $_POST['id_category'] ."', 
            '". $_POST['codebar'] ."', 
            '". $_POST['price'] ."'
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
    $sql = "SELECT * FROM user WHERE id = " . $idProduct;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $userInfos = $result->fetch_object();
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
                <input type="text" name="name" required>
            </label>

            <label>
                <div class="lbl">Categoria</div>
                <input type="text" name="id_category" required>
            </label>

            <label>
                <div class="lbl">Código de Barras (EAN-13)</div>
                <input type="text" name="codebar" maxlength="13">
            </label>

            <label>
                <div class="lbl">Preco</div>
                <input type="number" min="0.00" max="10000.00" step="0.10" name="price" />
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>