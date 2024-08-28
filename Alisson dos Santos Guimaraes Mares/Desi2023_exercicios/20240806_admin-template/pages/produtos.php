<?php
//var_dump($_POST);

    if (!empty($_POST)) {
        $sql = "
        INSERT INTO user
        (nome, idcategoria, codebar, preco)
        VALUES
   ('" . $_POST['nome'] . "',
    '" . $_POST['idcategoria'] . "',
    '" . $_POST['codebar'] . "',
    '" . $_POST['preco'] . "',
    ";

    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Produto " . $_POST['nome'] . " cadastrado com sucesso!')</script>";
    }
}

?>

<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Produtos</div>
        <div class="cb-body">
         <form method="POST" action="" id="productForm" name="productForm" novalidate>
         <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" required>
            </label>

            <label>
                <div class="lbl">Categoria</div>
                <input type="text" name="categoria" required>
            </label>

            <label>
                <div class="lbl">CODEBAR (EAN - 13)</div>
                <input type="text" name="codebar" required maxlength="13">
            </label>

            <label>
                <div class="lbl">Preço</div>
                <input type="number" name="preco" min="0.00" max="10000.00" step="0.01" name="preco" />
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
    