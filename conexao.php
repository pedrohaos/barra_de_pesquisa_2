<?php 

$host = 'localhost';
$db = 'tb_buscar';
$user = 'root';
$pass = '1234';


$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die("Falha na conexão com o banco de dados");
}
?>