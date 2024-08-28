<?php
var_dump($POST);

if(!empty($_POST)){
    $sql = " 
    INSERT INTO product (nome, idcategoria, codebar, preco)
    VALUES
    ('" ;

}


?>  


<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Produtos

        </div>
    </div>

    <div class="cb-body">
        <form method="POST" action="" id="userForm" name="userForm" novalidate>
            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" required>
            </label>

            <label>
                <div class="lbl">Categoria</div>
                <input type="text" name="Categoria" required>
            </label>

            <label>
                <div class="lbl">Codebar</div>
                <input type="text" name="Codebar" maxlength="13">
            </label>

            <label>
                <div class="lbl">Preço</div>
                <input type="number" min="0.00" max="10000.00" step="0.10" name="preco" />
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>

        </form>


    </div>

</div>