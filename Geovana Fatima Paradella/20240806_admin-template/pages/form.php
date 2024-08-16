
<?php
var_dump($_POST);
if(!empty($_POST)){

	$sql ="
	INSERT INTO user 
	( pass, usename, email, name, birthdate, photo, cep, id_city, id_state) 
	VALUES 
	( '".$_POST['pass']."', '".$_POST['username']."', '".$_POST['email']."', '".$_POST['name']."', '".$_POST['birthdate']."', '".$_POST[' photo']."', '".$_POST['cep']."', '".$_POST['id_city']."', '".$_POST['id_state']."')";
	$result = $con->query($sql);
}
?>


<div class="container-box cb-form-max-width align-center flex-1">
	<div class="cb-header">
		<div class="cb-title">Formulário</div>
	</div>
	<div class="cb-body">
		<form method="POST" action="">
			<label>
				<div class="lbl">foto</div>
				<input type="file" name="photo">
			</label>
			<label>
				<div class="lbl">Nome</div>
				<input type="text" name="name">
			</label>
			<label>
				<div class="lbl">usuario</div>
				<input type="text" name="usename">
			</label>
			<label>
				<div class="lbl">senha</div>
				<input type="text" name="pass">
			</label>
			<label>
				<div class="lbl">email</div>
				<input type="text" name="email">
			</label>
			<label>
				<div class="lbl">data de nascimento</div>
				<input type="date" name="birthdate">
			</label>
			<label>
				<div class="lbl">cep</div>
				<input type="text" name="cep">
			</label>
			<label>
				<div class="lbl">estado</div>
				<input type="text" name="id_state">
			</label>
			<label>
				<div class="lbl">cidade</div>
				<input type="text" name="id_city">
			</label>

			<div class="form-actions">
				<button type="submit">Enviar</button>
			</div>

		</form>
	</div>
</div>