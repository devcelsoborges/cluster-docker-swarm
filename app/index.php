<?php
$servername = "db";
$username = getenv("MYSQL_USER") ?: "user";
$password = getenv("MYSQL_PASSWORD") ?: "userpass";
$database = getenv("MYSQL_DATABASE") ?: "toshiro_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}
echo "Conectado com sucesso à base de dados!";
?>
