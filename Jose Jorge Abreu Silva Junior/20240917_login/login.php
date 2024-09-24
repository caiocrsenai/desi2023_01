<?php
$con = mysqli_connect("localhost", "root", "", "desi202301_admin");

session_start();
ob_start();

echo '<pre>';
var_dump($_SESSION);
var_dump(isUserLoggedIn());
echo '</pre>';

if (!empty($_GET)) {
    if ($_GET['logout'] == 'true') {
        logoutUser();
    }
}

if (!empty($_POST)) {
    $sql = "SELECT * FROM user 
    WHERE username = '" . $_POST['username'] . "' 
    AND pass = '" . $_POST['password']  . "';";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $userInfos = $result->fetch_object();

        $_SESSION['session_id'] = session_id();
        $_SESSION['username'] = $userInfos->username;
        $_SESSION['email'] = $userInfos->email;

        echo 'Login bem-sucedido!';
        unset($_POST);
        header("Location: login.php");
    } else {
        echo 'Usuário ou senha incorretos.';
    }
}

function isUserLoggedIn()
{
    // Verifica se o usuário está logado e se o session_id() é válido
    if (isset($_SESSION['session_id']) && $_SESSION['session_id'] === session_id()) {
        return true; // Usuário está logado
    } else {
        return false; // Usuário não está logado
    }
}

function logoutUser()
{
    // Limpa todas as variáveis de sessão
    $_SESSION = array();

    // Destrói a sessão
    session_destroy();

    // Redireciona para a página de login (ou qualquer outra página)
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Exemplo de Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            padding: 50px;
        }
    </style>
</head>

<body>
    <center>

    <a href="inicial.php">Pagina Inicial</a>
    <br>
    <br>

        <?php if (isUserLoggedIn()): ?>
            Meu usuário está logado <br>
            meu username é: <?php echo $_SESSION['username']; ?> <br>
            meu email é: <?php echo $_SESSION['email']; ?> <br>
            meu id da sessão é: <?php echo $_SESSION['session_id']; ?> <br><br>
            <a href="?logout=true">Sair</a>
        <?php else: ?>
            <h2>Login</h2>
            <form method="POST" action="">
                <label for="username">Usuário:</label>
                <input type="text" name="username" id="username" required>
                <br>
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" required>
                <br>
                <button type="submit">Entrar</button>
            </form>
        <?php endif; ?>
    </center>
</body>

</html>