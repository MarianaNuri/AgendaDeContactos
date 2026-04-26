<?php
require("config/bd.php");

// Aceptar tanto GET como POST
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} elseif (isset($_POST["id"])) {
    $id = $_POST["id"];
} else {
    die("ID no especificado");
}

$stmt = $pdo->prepare("DELETE FROM contactos WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
