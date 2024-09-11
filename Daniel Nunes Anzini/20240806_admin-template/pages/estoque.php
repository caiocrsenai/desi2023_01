<?php
$idStock = false;
$stockInfos = false;

if (!empty($_GET[id])) {
    $idStock
 = $_GET[id];
}

if (!empty($_POST)) {

    if ($idStock
) {
        $sql = "UPDATE `stock` SET
         `id_product` = 10222,
          `quantity` = 20222
          WHERE `stock`.`id` = 2";
    } else {
        $sql = "INSERT INTO stock 
        (id, id_product, quantity, timestamp) 
        VALUES
         ( 
         NULL, 10, 20, 
        current_timestamp()
        )";
        
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($$idStock
) {
            $action = "alterado";
        }

        echo "<script>alert(Estoque " . $_POST[name] . " " . $action . " com sucesso!)</script>";
    }
}

if ($$idStock
) {
    $sql = "SELECT * FROM category WHERE id = " . $$idStock
;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $$stockInfos = $result->fetch_object();
    }
}

?>
<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Categoria</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="stockForm" name="stockForm" novalidate>
            <label>
                <div class="lbl">id_product</div>
                <input type="text" name="id_product" value="<?php echo $$stockInfos ? $$stockInfos->name :  ?>" required>
            </label>

            <label>
                <div class="lbl">quantity</div>
                <input type="text" name="quantity" value="<?php echo $$stockInfos ? $$stockInfos->description :  ?>" required>
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>