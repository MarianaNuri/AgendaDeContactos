<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
require("config/bd.php");

$buscar = "";

if (isset($_GET["buscar"]) && !empty($_GET["buscar"])) {
    $buscar = htmlspecialchars($_GET["buscar"]);

    $sql = "SELECT * FROM contactos 
            WHERE nombre LIKE :buscar 
            OR apellido LIKE :buscar 
            OR telefono LIKE :buscar 
            OR email LIKE :buscar
            ORDER BY id DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":buscar" => "%" . $buscar . "%"
    ]);
} else {
    $sql = "SELECT * FROM contactos ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("includes/header.php"); ?>

<div class="contacts-container">

    <div class="contacts-header">
        <h2 class="contacts-title">
            <i class="bi bi-people-fill"></i>
            Agenda de contactos
        </h2>

        <a href="crear.php" class="btn-new-contact">
            <i class="bi bi-plus-circle-fill"></i>
            Nuevo contacto
        </a>
    </div>

    <?php if (count($contactos) === 0): ?>
        <div class="contacts-empty">
            <i class="bi bi-person-x" style="font-size: 3rem; color: #55AAFF;"></i>
            <p>No hay contactos todavía.</p>
            <p style="font-size: .85rem; color: #88a8cc;">¡Agrega tu primer contacto!</p>
        </div>
    <?php else: ?>
    <div class="contacts-table-wrapper">
        <table class="contacts-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $c): ?>
                <tr>
                    <td data-label="Foto">
                        <div class="contact-avatar">
                            <img src="uploads/<?php echo htmlspecialchars($c['foto']); ?>" alt="Foto de <?php echo htmlspecialchars($c['nombre']); ?>">
                        </div>
                    </td>
                    <td data-label="Nombre">
                        <span class="contact-name"><?php echo htmlspecialchars($c['nombre'] . " " . $c['apellido']); ?></span>
                    </td>
                    <td data-label="Teléfono">
                        <span class="contact-phone"><i class="bi bi-telephone-fill"></i> <?php echo htmlspecialchars($c['telefono']); ?></span>
                    </td>
                    <td data-label="Email">
                        <span class="contact-email"><i class="bi bi-envelope-fill"></i> <?php echo htmlspecialchars($c['email']); ?></span>
                    </td>
                    <td data-label="Acciones">
                        <div class="contact-actions">
                            <a href="ver.php?id=<?php echo $c['id']; ?>" class="btn-action btn-view" title="Ver">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="editar.php?id=<?php echo $c['id']; ?>" class="btn-action btn-edit" title="Editar">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a href="#" class="btn-action btn-delete" title="Eliminar" onclick="openDeleteModal(<?php echo $c['id']; ?>, '<?php echo htmlspecialchars($c['nombre'] . ' ' . $c['apellido'], ENT_QUOTES); ?>')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

</div>

<!-- Modal de confirmación para eliminar -->
<div class="delete-modal-overlay" id="deleteModalOverlay">
    <div class="delete-modal">
        <div class="delete-modal-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h3 class="delete-modal-title">¿Eliminar contacto?</h3>
        <p class="delete-modal-text">Estás a punto de eliminar a <strong id="deleteContactName"></strong>. Esta acción no se puede deshacer.</p>
        <div class="delete-modal-actions">
            <button type="button" class="btn-modal btn-modal-cancel" onclick="closeDeleteModal()">Cancelar</button>
            <form action="eliminar.php" method="POST">
                <input type="hidden" name="id" id="deleteId">

                <button type="submit" class="btn-modal btn-modal-confirm">
                <i class="bi bi-trash-fill"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal(id, nombre) {
    document.getElementById('deleteContactName').textContent = nombre;
    document.getElementById('deleteId').value = id;
    document.getElementById('deleteModalOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    document.getElementById('deleteModalOverlay').classList.remove('active');
    document.body.style.overflow = '';
}

// Cerrar modal al hacer clic fuera
document.getElementById('deleteModalOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});

// Cerrar modal con Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeDeleteModal();
});
</script>

<?php include("includes/footer.php"); ?>
