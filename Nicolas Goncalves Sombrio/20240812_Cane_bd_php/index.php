<?php
    $con=mysqli_connect("localhost","root","","bd_php")
    or die ( mysql_error('Erro na conexão'));

    //let msg_padrao = 'assim seria o javascript
    $msg_padrao_podre = 'Alô, mundo';

    print $msg_padrao_podre;
    $sql = "SELECT * FROM usuarios";
    $result = $con->query($sql);

    if ($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()){
            echo "id : " . $row["idusuarios"]. "- Nome: " .
            $row["nome"]. " " . $row["email"]. "<br>";
        } else {
            echo "ZERO resultados!!!";
        }
    }
?>