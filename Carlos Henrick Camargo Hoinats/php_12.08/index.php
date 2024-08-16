<?php

    $con=mysqli_connect("localhost", "root", "", "bd_php")
    or die (mysql_erro('erro na conexão'));

    //var msg_padrao = 'assim seria no javascript';
    //Javascript
    //int i = 0
    
    //PHP
    //$i = 0

    $msg_padrao_podre = 'Alô, mundo';
    echo "<p>$msg_padrao_podre</p>";

    $sql = "SELECT * FROM usuarios";
    $result = $con-> query($sql);

    if ($result-> num_rows > 0) {
         // output data of each row
         while($row = $result -> fetch_assoc()){
            echo "id: " . $row["idusuarios"]. " -Nome: " . 
            $row["nome"]. " " . $row["email"]. "<br>";
         }
    }else {
        echo "Zero resultados!!!";
    }

?>