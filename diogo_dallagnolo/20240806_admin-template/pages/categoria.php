<?php
$idStock = false;
$stockInfos = false;

if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idStock) {
        $sql = "UPDATE category SET 
        name = '" . $_POST['name'] . "', 
        description = '" . $_POST['description'] . "' 
        WHERE category.id = ".$idStock."";
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
    $sql = "SELECT * FROM category WHERE id = " . $idStock;
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
        <form method="POST" action="" id="categoryForm" name="categoryForm" novalidate>
            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" value="<?php echo $stockInfos ? $stockInfos->name : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Descrição</div>
                <input type="text" name="description" value="<?php echo $stockInfos ? $stockInfos->description : '' ?>" required>
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>