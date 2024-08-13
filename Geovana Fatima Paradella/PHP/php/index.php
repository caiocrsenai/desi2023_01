<?php
    $con=mysqli_connect("localhost","root","","coisas") or die(mysql_error("erro de conexão"));
    $msg_padrao_podre = 'Alô, mundo';
    echo $msg_padrao_podre;

    $sql="select * from usuarios";
    $result=$con->query($sql);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
            echo "id: " .$row["id_usuarios"]. " - nome: ".
            $row["nome"]. " ". $row["email"]. "<br>";
        }
    } else {
        echo"Zero resultados!!!";
    }
?>