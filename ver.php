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

<div class="card card-detail">
    <h2>Detalle del Contacto</h2>

    <!-- Foto arriba -->
    <div class="detail-photo">
        <img src="uploads/<?= htmlspecialchars($contacto["foto"]) ?>" alt="Foto de <?= htmlspecialchars($contacto["nombre"]) ?>">
    </div>

    <!-- Nombre completo -->
    <p class="detail-name">
        <?= htmlspecialchars($contacto["nombre"] . " " . $contacto["apellido"]) ?>
    </p>

    <!-- Información del contacto -->
    <div class="detail-info">
        <div class="detail-row">
            <i class="bi bi-telephone-fill"></i>
            <div>
                <span class="detail-label">Teléfono</span>
                <span class="detail-value"><?= htmlspecialchars($contacto["telefono"]) ?></span>
            </div>
        </div>
        <div class="detail-row">
            <i class="bi bi-envelope-fill"></i>
            <div>
                <span class="detail-label">Email</span>
                <span class="detail-value"><?= htmlspecialchars($contacto["email"]) ?></span>
            </div>
        </div>
        <div class="detail-row">
            <i class="bi bi-geo-alt-fill"></i>
            <div>
                <span class="detail-label">Dirección</span>
                <span class="detail-value"><?= htmlspecialchars($contacto["direccion"]) ?></span>
            </div>
        </div>
        <?php if (!empty($contacto["notas"])): ?>
        <div class="detail-row">
            <i class="bi bi-sticky-fill"></i>
            <div>
                <span class="detail-label">Notas</span>
                <span class="detail-value"><?= htmlspecialchars($contacto["notas"]) ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <a href="index.php" class="back-link">
        <span class="arrow">←</span> Volver a la agenda
    </a>
</div>

<?php include("includes/footer.php"); ?>
