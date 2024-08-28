<?php
//var_dump($_POST);
if (!empty($_POST)) {
    $sql = "
    INSERT INTO user
    (pass, username, email, name, birthdate, photo, cep, id_city, id_state)
    VALUES
    (
    '" . $_POST['pass'] . "',
    '" . $_POST['username'] . "',
    '" . $_POST['email'] . "',
    '" . $_POST['name'] . "',
    '" . $_POST['birthdate'] . "',
    '" . $_POST['photo'] . "',
    '" . $_POST['cep'] . "',
    '" . $_POST['id_city'] . "',
    '" . $_POST['id_state'] . "'
    )
    ";
    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Usuário " . $_POST['username'] . " cadastrado com sucesso!')</script>";
    }
}
?>
<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Formulário</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="userForm" name="userForm" novalidate>
            <label>
                <div class="lbl">Foto</div>
                <input type="file" name="photo">
            </label>

            <label>
                <div class="lbl">Nome</div>
                <input type="text" name="name" required>
            </label>

            <label>
                <div class="lbl">Usuário</div>
                <input type="text" name="username" required>
            </label>

            <label>
                <div class="lbl">Senha</div>
                <input type="password" name="pass" required>
            </label>

            <label>
                <div class="lbl">Email</div>
                <input type="email" name="email" id="email" required>
            </label>

            <label>
                <div class="lbl">Data de Nascimento</div>
                <input type="date" name="birthdate" required>
            </label>

            <label>
                <div class="lbl">Cep</div>
                <input type="text" name="cep" required>
            </label>

            <label>
                <div class="lbl">Estado</div>
                <select name="id_state">



                    <option selected disabled style="display: none;" value="">Selecione o estado</option>
                    <?php
                    $sql = "SELECT * FROM state";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->id_state . '">' . $row->nome . ' (' . $row->uf . ')</option>';
                        }
                    }
                    ?>
                </select>
            </label>

            <label>
                <div class="lbl">Cidade</div>
                <select name="id_city">
                    <option selected disabled style="display: none;" value="">Selecione o cidade</option>
                    <?php
                    $sql = "SELECT * FROM city";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->id_city . '" data-uf="' . $row->uf . '" class="hide">' . $row->nome . '</option>';
                        }
                    }
                    ?>
                </select>
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>
</div>

<script>
    _qs('#userForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const _this = this,
            _elements = _this._qsa('input, select');

        let sendForm = true;


        _elements.forEach(function (_element) {
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


    _qs('[name="id_state"]').addEventListener('change', function (event) {
        const _this = this,
        value = _this.value,
        idState = _this.value,
        _city = _qs('[name="id_city"]');

        _city._qsa('option').forEach(function(_optCity) {
            const optCityIdState = _optCity.getAttribute('data-uf');


            if(optCityIdState == idState){
                _optCity.classList.remove('hide');
            }else{
                _optCity.classList.add('hide');
            }    
                
               

            
        });
    });


    _qs('#userForm')._qsa('input, select').forEach(function (_element) {
        const tagName = _element.tagName.toLowerCase();
        let event = 'keyup';

        if (tagName == 'select') {
            event = 'change';
        }

        _element.addEventListener(event, function (event) {
            const _this = this,
                val = _element.value;

            _this.classList.remove('error');
        });
    });


    /*
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function validateForm() {
        const form = document.getElementById('userForm');
        const fields = form.querySelectorAll('input');
        let isValid = true;

        let mailField = document.querySelector('#email');
        if (!emailPattern.test(mailField.value)) {
            alert('Este email está inadequado.');
            isValid = false;
        }

        return isValid;
    }

    document.getElementById('userForm').addEventListener('submit', function(event) {
        var validate = validateForm();
        if (!validate) {
            event.preventDefault(); // Impede o envio do formulário se a validação falhar
            alert('Favor preencher todos os campos obrigatórios.');
        }
    });
    */
</script>