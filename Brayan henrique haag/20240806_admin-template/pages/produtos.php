<?php 

?>

<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">produtos</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="productForm" name="productForm" novalidate>
            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" required>
            </label>

            <label>
                <div class="lbl">categoria</div>
                <input type="text" name="categoria" required>
            </label>

            <label>
                <div class="lbl">codigo de barra (EAN-13)</div>
                <input type="text" name="codebar" maxlength="">
            </label>

            <label>
                <div class="lbl">preco</div>
                <input type="number" min="0,00" max="10000.00" step="0.10" name="preco" />
            </label>

            <div class="form-action">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>