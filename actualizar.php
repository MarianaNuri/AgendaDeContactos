<?php
require("config/bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["telefono"])) {
        die("El teléfono es obligatorio");
    }

    if (!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Email inválido");
    }

    // Sanitización
    $id = $_POST["id"];
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $direccion = htmlspecialchars($_POST["direccion"]);
    $notas = htmlspecialchars($_POST["notas"]);

    // FOTO
    if (!empty($_FILES["foto"]["name"])) {
        $foto = $_FILES["foto"]["name"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], "uploads/" . $foto);
    } else {
        $stmt = $pdo->prepare("SELECT foto FROM contactos WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $foto = $data["foto"];
    }

    $sql = "UPDATE contactos SET 
            nombre = ?, 
            apellido = ?, 
            telefono = ?, 
            foto = ?, 
            email = ?, 
            direccion = ?, 
            notas = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $nombre,
        $apellido,
        $telefono,
        $foto,
        $email,
        $direccion,
        $notas,
        $id
    ]);

    header("Location: index.php");
}
