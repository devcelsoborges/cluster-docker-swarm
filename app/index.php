<?php
$servername = "db";
$username = "user";
$password = "userpass";
$database = "toshiro_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
echo "Conectado com sucesso ao banco de dados!";
?>
