<?php
//var_dump($_POST);
if (!empty($_POST)) {
    $sql = "
    INSERT INTO user 
    (nome, idacategoria, codebar, preco)
    VALUES
    (
    '" . $_POST['nome'] . "',
    '" . $_POST['categoria'] . "',
    '" . $_POST['preco'] . "',
     '" . $_POST['codebar'] . "',
    )";
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
        <form method="POST" action="" id="userForm" name="userForm" novalidate>
            <label>
                <div class="lbl">nome</div>
                <input type="text" name="name" required>
            </label>

            <label>
                <div class="lbl">categoria</div>
                <input type="text" name="categoria" required>
            </label>

            <label>
                <div class="lbl">codigo de barras (EAN-13)</div>
                <input type="text" name="codebarr" maxlength="13">
            </label>

            <label>
                <div class="lbl">preco</div>
                <input type="number" name="number" min="0.00" max="10000.0" step="0.10" name="preco" required />
            </label>

            <div class="form actions">
                <button type="submit"> Enviar </button>
            </div>

        </form>
    </div>
</div>div>