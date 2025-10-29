<?php
$host = 'localhost';

$user = 'root';
$pass = '';
$db_name = 'books_db';
$port = 3307;
$conn = mysqli_connect($host, $user, $pass, $db_name, $port);
if (!$conn) {
    die('Erro ao conectar ao MySQL: ' . mysqli_connect_error());
}
?>