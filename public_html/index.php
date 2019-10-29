<?php
$host = 'mysql';
$user = 'root';
$pass = '12345678';
$base = 'asistencia';
$conn = new mysqli($host, $user, $pass, $base);

//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} else {
//    echo "Coneccion correcta!";
//}
$sql = $conn->query("select * from tipo_usuario");
$res = array();
while($row = $sql->fetch_assoc()){
$res[]=$row;
}

echo json_encode($res);
//echo "number of rows: " . $res->num_rows;
//$sql = "select * from tipo_usuario";
//$result = $conn->query($sql) or die($conn->error);
//while($row = $result->fetch_assoc()){
//    echo "holi";
//}
?>
