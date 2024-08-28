<?php
//var_dump($_POST);

if (!empty($_POST)) {
    $sql = "
    INSERT INTO product
    (nome, idcategoria, codebar, preco)
    VALUES
    (
    '".$_POST['name']. "',
    '".$_POST['categoria']. "',
    '".$_POST['codebar']. "',
    '".$_POST['preco']. "'
    );
    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Usuário " . $_POST['username'] . " cadastrado com sucesso!')</script>";
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
                <input type="text" name="categoria" required>
            </label>

            <label>
                <div class="lbl">Codebar</div>
                <input type="text" name="codebar" required maxlenght ="13">
            </label>

            <label>
                <div class="lbl">Preco</div>
                <input type="number" min="0.00" max="10000.00" step="0.01" name="preco">
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>