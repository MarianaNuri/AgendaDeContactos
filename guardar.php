<?php
require("config/bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validacion
    if (empty($_POST["telefono"])) {
        die("El teléfono es obligatorio");
    }
    if (!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Email inválido");
    }

    //Sanitización
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $direccion = htmlspecialchars($_POST["direccion"]);
    $notas = htmlspecialchars($_POST["notas"]);

    //imagen
    $foto = $_FILES["foto"]["name"];
    $ruta = "uploads/" . $foto;

    move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

    //insert con prepared statement
    $sql = "INSERT INTO contactos 
            (nombre, apellido, telefono, foto, email, direccion, notas)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $nombre,
        $apellido,
        $telefono,
        $foto,
        $email,
        $direccion,
        $notas
    ]);

    header("Location: index.php");
}
?>
