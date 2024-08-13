<?php

//var msg_padrao = 'assim seria no javascript';
// int i =0;

//php:
// $i = 0;

$con=mysqli_connect("localhost","root","","bd_php") or die (mysql_erro('Erro na conexão'));

    $msg_padrao_podre = 'Hello world';
  
    
    echo "<p>$msg_padrao_podre</p>";
   
    $sql = "select * from usuarios";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

        while ($row = $result->fetch_assoc()){
            echo "id: " . $row["idusuarios"]. " - Nome: " . 
            $row["nome"]. " - email:" . $row["email"]. "<br>";
        }
    }   else {
        echo "ZERO RESULTADOS!!!";
    }

?>