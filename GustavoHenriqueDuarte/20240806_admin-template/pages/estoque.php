<?php

$idStock = false;
$stockInfos = false;

if (!empty($_GET['id'])) {
    $idStock = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idStock) {
        $sql = "UPDATE stock SET 
        id_product = '" . $_POST['id_product'] . "', 
        quantity = '" . $_POST['quantity'] . "'
        WHERE stock.id = " . $idStock . "
        ";
    } else {
        $sql = "
        INSERT INTO stock 
        (id_product, quantity) 
        VALUES (
            '" . $_POST['id_product'] . "',
             '" . $_POST['quantity'] . "'
        )
        ";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if ($idStock) {
            $action = "alterado";
        }
        echo "<script>alert('Estoque do produto " . $_POST['name_product'] . " " . $action . " com sucesso!'); window.location.href = '?page=estoques'</script>";
    }
}

if ($idStock) {
    $sql = "SELECT * FROM stock WHERE id = " . $idStock;
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $stockInfos = $result->fetch_object();
    }
}
?>


<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Estoque</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="stockForm" name="stockForm" novalidate>
            <label>
                <div class="lbl">Produto</div>
                <select name="id_product">
                    <option selected disabled style="display: none;" value="">Selecione o produto</option>
                    <?php

                    $sql = "SELECT id, name FROM product";
                    $result = $con->query($sql);

                    while ($row = $result->fetch_object()) {
                        $selected = ($stockInfos ? $stockInfos->id_product : '') == $row->id ? 'selected' : '';
                        echo '<option value="' . $row->id . '"
                            ' . ($stockInfos ? ($stockInfos->id_product == $row->id ? 'selected' : '') : '') . '>' . $row->name . '</option>';
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Quantidade</div>
                <input type="text" name="quantity" value="<?php echo $stockInfos ? $stockInfos->quantity : '' ?>" required>
            </label>

            <input name="name_product" type="hidden">

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function trigger(el, eventType) {
        if (typeof eventType === 'string' && typeof el[eventType] === 'function') {
            el[eventType]();
        } else {
            const event =
                typeof eventType === 'string' ?
                new Event(eventType, {
                    bubbles: true
                }) :
                eventType;
            el.dispatchEvent(event);
        }
    }


    _qs('[name="id_product"]').addEventListener('change', function(e) {
        const _this = this;
        _qs('[name="name_product"]').value = _this.selectedOptions[0].innerText;
    });

    trigger(_qs('[name="id_product"]'), 'change');
</script>