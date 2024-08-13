
<?php
$con=mysqli_connect("localhost" , "root","" , "bd_php") or die(mysql_error("erro de conexão"));
$msg_padrao_podre = 'alo mundo';
echo $msg_padrao_podre;

$sql= "select * from usuarios";
$result=$con->query($sql);



 if ($result->num_rows > 0) {

while($row = $result -> fetch_assoc()) {
echo "id: " . $row ["idusuarios"]. " - nome:  " .  
 $row["nome"]. " ". $row ["email"]. "<br>";

} 
 } else {
    echo"zero resultados!!!";
 } 
?>
