<?php
$idItem = false;
$pageObjInfos = false;

if (!empty($_GET['id'])) {
    $idItem = $_GET['id'];
}

if (!empty($_POST)) {

    if ($idItem) {
        $sql = "
        UPDATE produtos SET 
        name = '" . $_POST['name'] . "', 
        description = '" . $_POST['description'] . "', 
        price = '" . $_POST['price'] . "', 
        quantity = '" . $_POST['quantity'] . "', 
        supplier_id = '" . $_POST['supplier_id'] . "', 
        WHERE user.id = " . $idItem . "
        ";
    } else {
        $sql = "
        INSERT INTO produtos
        (name, description, price, quantity, supplier_id)
        VALUES
        (
        '" . $_POST['name'] . "',
        '" . $_POST['description'] . "',
        '" . $_POST['price'] . "',
        '" . $_POST['quantity'] . "',
        '" . $_POST['supplier_id'] . "'
        )
        ";
    }

    $result = $con->query($sql);

    if ($result) {
        $action = "cadastrado";
        if($idItem){
            $action = "alterado";
        }

        echo "<script>alert('Usuário " . $_POST['description'] . " " . $action . " com sucesso!')</script>";
    }
}

if ($idItem) {
    $sql = "SELECT * FROM produtos WHERE id = " . $idItem;
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $pageObjInfos = $result->fetch_object();
    }
}

?>
<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Formulário</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="userForm" name="userForm" novalidate>
            <!-- <label>
                <div class="lbl">Foto</div>
                <input type="file" name="photo">
            </label> -->

            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" value="<?php echo $pageObjInfos ? $pageObjInfos->name : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Descriçao</div>
                <textarea type="text" name="description" required><?php echo $pageObjInfos ? $pageObjInfos->description : '' ?></textarea>
            </label>

            <label>
                <div class="lbl">Preço</div>
                <input type="text" name="price" value="<?php echo $pageObjInfos ? $pageObjInfos->price : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Quantidade</div>
                <input type="text" name="quantity" id="quantity" value="<?php echo $pageObjInfos ? $pageObjInfos->quantity : '' ?>" required>
            </label>

            <label>
                <div class="lbl">Fornecedor</div>
                <input type="text" name="supplier_id" value="<?php echo $pageObjInfos ? $pageObjInfos->supplier_id : '' ?>" required>
            </label>

            <?php /*
            <label>
                <div class="lbl">Estado</div>
                <select name="id_state">
                    <option selected disabled style="display: none;" value="">Selecione o estado</option>
                    <?php
                    $sql = "SELECT * FROM state";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->id_state . '" ' . ($pageObjInfos ? ($pageObjInfos->id_state == $row->id_state ? 'selected' : '') : '') . '>' . $row->nome . ' (' . $row->uf . ')</option>';
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Cidade</div>
                <select name="id_city">
                    <option selected disabled style="display: none;" value="">Selecione a cidade</option>
                    <?php
                    $sql = "SELECT * FROM city";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo '<option 
                            value="' . $row->id_city . '" 
                            data-uf="' . $row->uf . '" 
                            class="hide" ' . ($pageObjInfos ? ($pageObjInfos->id_city == $row->id_city ? 'selected' : '') : '') . '>' . $row->nome . '</option>';
                        }
                    }
                    ?>
                </select>
            </label> 
            */ ?>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>
</div>

<script>
    _qs('#userForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const _this = this,
            _elements = _this._qsa('input, select');
        let sendForm = true;

        _elements.forEach(function(_element) {
            const val = _element.value;

            if (val == '') {
                sendForm = false;
                _element.classList.add('error');
            } else {
                _element.classList.remove('error');
            }
        });

        if (sendForm == true) {
            _this.submit();
        }
    });

    _qs('[name="id_state"]').addEventListener('change', function(event) {
        const _this = this,
            idState = _this.value,
            _city = _qs('[name="id_city"]');

        _city._qsa('option').forEach(function(_optCity) {
            const optCityIdState = _optCity.getAttribute('data-uf');

            if (optCityIdState == idState) {
                _optCity.classList.remove('hide');
            } else {
                _optCity.classList.add('hide');
            }
        });
    });

    _qs('#userForm')._qsa('input, select').forEach(function(_element) {
        const tagName = _element.tagName.toLowerCase();
        let event = 'keyup';

        if (tagName == 'select') {
            event = 'change';
        }

        _element.addEventListener(event, function(event) {
            const _this = this,
                val = _element.value;

            _this.classList.remove('error');
        });
    });
