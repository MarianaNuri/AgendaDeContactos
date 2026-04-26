<?php
require("config/bd.php");

if (!isset($_GET["id"])) {
    die("ID no especificado");
}

$stmt = $pdo->prepare("SELECT * FROM contactos WHERE id = ?");
$stmt->execute([$_GET["id"]]);
$contacto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$contacto) {
    die("Contacto no encontrado");
}

include("includes/header.php");
?>

<div class="card">
    <h2>Editar Contacto</h2>

    <form action="actualizar.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $contacto["id"] ?>">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($contacto["nombre"]) ?>" required>
        </div>

        <div class="form-group">
            <label>Apellido</label>
            <input type="text" name="apellido" value="<?= htmlspecialchars($contacto["apellido"]) ?>">
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" value="<?= htmlspecialchars($contacto["telefono"]) ?>" required>
        </div>

        <div class="form-group">
            <label>Foto actual</label><br>
            <img src="uploads/<?= htmlspecialchars($contacto["foto"]) ?>" width="100">
        </div>

        <div class="form-group">
            <label>Nueva foto</label>
            <input type="file" name="foto">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($contacto["email"]) ?>">
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccion" value="<?= htmlspecialchars($contacto["direccion"]) ?>">
        </div>

        <div class="form-group">
            <label>Notas</label>
            <textarea name="notas"><?= htmlspecialchars($contacto["notas"]) ?></textarea>
        </div>

        <button type="submit" class="btn-submit">Actualizar Contacto</button>

    </form>

    <a href="index.php" class="back-link">← Volver</a>
</div>

<?php include("includes/footer.php"); ?>
