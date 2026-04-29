<?php
$host = "sql312.infinityfree.com";
$db = "if0_41722192_agenda";
$user = "if0_41722192";
$pass = "c22sr0TTwX";
$charset = "utf8mb4";

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión");
}
?>