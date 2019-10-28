<h1>Hello!</h1>
<h4>Coneccion a mysql con php...</h4>
<?php
$host = 'mysql';
$user = 'root';
$pass = '12345678';
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Coneccion correcta!";
}

?>
