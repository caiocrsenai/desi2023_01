<?php
//var_dump($_POST);
if(!empty($_POST)){
    $sql = "
    INSERT INTO user
    (pass, username, email, name, birthdate, photo, cep, id_city, id_state)
    VALUES
    (
    '".$_POST['pass']."',
    '".$_POST['username']."',
    '".$_POST['email']."',
    '".$_POST['name']."',
    '".$_POST['birthdate']."',
    '".$_POST['photo']."',
    '".$_POST['cep']."',
    '".$_POST['id_city']."',
    '".$_POST['id_state']."'
    )
    ";
    $result = $con->query($sql);

    if ($result) {
        echo "<script>alert('Usuário ".$_POST['username']." cadastrado com sucesso!')</script>";
    }
}
?>

<div class="container-box cb-form-max-width align-center flex-1">
    <div class="cb-header">
        <div class="cb-title">Formulário</div>
    </div>
    <div class="cb-body">
        <form method="POST" action="" id="userForm" name="userForm">
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
                <input type="text" name="id_state">
            </label>

            <label>
                <div class="lbl">Cidade</div>
                <input type="text" name="id_city">
            </label>

            <div class="form-actions">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>
</div>

<script>

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function validateForm() {
    const form = document.getElementById('userForm'); 
    // Get all input fields
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
    if (!validateForm()) {
        event.preventDefault(); // Impede o envio do formulário se a validação falhar
        alert('Favor preencher todos os campos obrigatórios.');
    }
});


</script>