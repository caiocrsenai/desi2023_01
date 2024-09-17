<?php
session_start();
ob_start();

function isUserLoggedIn()
{
    // Verifica se o usuário está logado e se o session_id() é válido
    if (isset($_SESSION['session_id']) && $_SESSION['session_id'] === session_id()) {
        return true; // Usuário está logado
    } else {
        return false; // Usuário não está logado
    }
}

echo '<pre>';
var_dump($_SESSION);
var_dump(isUserLoggedIn());
echo '</pre>';
?>

<a href="login.php">login</a>