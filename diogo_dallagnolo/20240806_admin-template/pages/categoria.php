<?php
$idCategory = false;
$categoryInfos = false;

if (!empty($_GET['id'])) {
    $idCategory = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idCategory) {
        $sql = "UPDATE category SET 
        name = '" . $_POST['name'] . "',
        description = '" . $_POST['description'] . "' 
        WHERE category.id = " . $idCategory . "";
    } else {
        $sql = "INSERT INTO category 
        ( name, description) 
        VALUES 
        ( 
        '" . $_POST['name'] . "', 
        '" . $_POST['description'] . "')
        ";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = 'cadastrada';

        if ($idCategory) {
            $action = "alterada";
        }

        echo "<script>alert('Categoria " . $_POST['name'] . " " . $action . " com sucesso!')</script>";
    }
}

if ($idCategory) {
    $sql = "SELECT * FROM category WHERE id = " . $idCategory;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $categoryInfos = $result->fetch_object();
    }
}

?>

<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Categoria</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="productForm" name="productForm" novalidate>
            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" value="<?php echo $categoryInfos ? $categoryInfos->name : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Descrição</div>
                <textarea  maxlength="150" type="text" name="description" class="description" value="<?php echo $categoryInfos ? $categoryInfos->description : '' ?>" required></textarea>
            </label>
            
            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>