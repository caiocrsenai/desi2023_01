<?php 

$con = mysqli_connect("localhost", "root", "", "teste")
or die (mysqli_error('Erro de conexão'));


$sql = "SELECT * FROM usuarios";
$result = $con-> query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['idusuarios'] ."<div> nome: " . $row['nome']. "<br> </div>";
        echo "<div> email: " . $row['email'] . "<br> </div>" ;
        echo "<br>";
    }
} else {
    echo "ZERO resultados!!";
}
?>