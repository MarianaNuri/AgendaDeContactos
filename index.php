<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require("config/bd.php");

$sql = "SELECT * FROM contactos ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
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

<<<<<<< HEAD
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
                            <a href="eliminar.php?id=<?php echo $c['id']; ?>" class="btn-action btn-delete" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este contacto?');">
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
=======
<table border="1">
    <tr>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Acciones</th> <!-- 👈 NUEVO -->
    </tr>

    <?php foreach ($contactos as $c): ?>
    <tr>
        <td>
            <img src="uploads/<?php echo htmlspecialchars($c['foto']); ?>" width="80">
        </td>

        <td>
            <?php echo htmlspecialchars($c['nombre'] . " " . $c['apellido']); ?>
        </td>

        <td><?php echo htmlspecialchars($c['telefono']); ?></td>

        <td><?php echo htmlspecialchars($c['email']); ?></td>

        <!-- 🔥 AQUÍ VA LO IMPORTANTE -->
        <td>
            <a href="ver.php?id=<?php echo $c['id']; ?>">Ver</a> |
            <a href="editar.php?id=<?php echo $c['id']; ?>">Editar</a> |

            <form action="eliminar.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar contacto?');">
                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                <button type="submit">Eliminar</button>
            </form>
        </td>

    </tr>
    <?php endforeach; ?>

</table>
>>>>>>> a95ee0f52f113ecaa2a45031c7adab2c2734e556

<?php include("includes/footer.php"); ?>
