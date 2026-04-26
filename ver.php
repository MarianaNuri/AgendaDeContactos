<?php
require("config/bd.php");

if (!isset($_GET["id"])) {
    die("ID no especificado");
}

$stmt = $pdo->prepare("SELECT * FROM contactos WHERE id = ?");
$stmt->execute([$_GET["id"]]);
$contacto = $stmt->fetch(PDO::FETCH_ASSOC);

include("includes/header.php");
?>

<div class="card">
    <h2>Detalle del Contacto</h2>

    <p><strong>Nombre:</strong> <?= htmlspecialchars($contacto["nombre"]) ?></p>
    <p><strong>Apellido:</strong> <?= htmlspecialchars($contacto["apellido"]) ?></p>
    <p><strong>Teléfono:</strong> <?= htmlspecialchars($contacto["telefono"]) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($contacto["email"]) ?></p>
    <p><strong>Dirección:</strong> <?= htmlspecialchars($contacto["direccion"]) ?></p>
    <p><strong>Notas:</strong> <?= htmlspecialchars($contacto["notas"]) ?></p>

    <img src="uploads/<?= htmlspecialchars($contacto["foto"]) ?>" width="150">

    <br><br>
    <a href="index.php" class="back-link">← Volver</a>
</div>

<?php include("includes/footer.php"); ?>
