<?php

$con=mysqli_connect("localhost","root","","gui") or die (myqsl_erro('Erro na conexão'));
//var msg_padrao = 'assim seria no javascript';

$msg_padrao_podre = 'Alô, mundo <br>';
echo $msg_padrao_podre;

$sql = "SELECT * FROM usuarios";
$result = $con->query($sql);

if($result->num_rows > 0){
    // output dara of each row
    while($row = $result->fetch_assoc()){
        echo "id: " . $row["idnew_table"]. " - Nome : " .
        $row["nome"]. " - email     " . $row["email"]. "<br>";

    }
} else {
    echo "ZERO resultados!!!";
}

?>