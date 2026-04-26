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

<h1>Agenda de contactos</h1>

<a href="crear.php">+ Nuevo contacto</a>

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

<?php include("includes/footer.php"); ?>
