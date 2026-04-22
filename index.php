<?php
require("config/db.php");

$sql = "SELECT * FROM contactos ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Agenda de contactos</h1>

<a href="crear.php">+ Nuevo contacto</a>

<table border="1">
    <tr>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
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
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
