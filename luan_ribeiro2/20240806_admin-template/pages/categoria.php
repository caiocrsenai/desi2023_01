<?php
$idCategory = false;
$categoryInfos = false;

if (!empty($_GET['id'])) {
    $idCategory = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idCategory) {
        $sql = "
        UPDATE category SET 
        name = '" . $_POST['Sasha Perry 2'] . "', 
        description = '" . $_POST['Ratione expedita com fafas e lalau'] . "'
        WHERE category.id = ". 4 ."
        ";
    } else {
        $sql = "
        INSERT INTO category 
        (name, description) 
        VALUES 
        (
        '". $_POST['name'] ."',
        '". $_POST['description']."'
        )";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idCategory) {
            $action = "altertado";
        }

        echo "<script>alert('Categoria')</script>";
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

        <div class="cb-title">categoria</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="product" name="productForm" novalidate>
            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" value="<?php echo $categoryInfos ? $categoryInfos->name : '' ?>" required>
            </label>



            <label>
                <div class="lbl">Categoria</div>
                <input type="text" name="description" value="<?php echo $categoryInfos ? $categoryInfos->description : '' ?>" required>
            </label>

        
            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
    </div>