<?php
require("config/bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];

    $stmt = $pdo->prepare("DELETE FROM contactos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
}
