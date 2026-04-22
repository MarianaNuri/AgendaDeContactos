<!DOCTYPE html>
<html>
<head>
    <title>Crear contacto</title>
</head>
<body>

<h2>Nuevo Contacto</h2>

<form action="guardar.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="nombre" placeholder="Nombre" required><br><br>

    <input type="text" name="apellido" placeholder="Apellido"><br><br>

    <input type="text" name="telefono" placeholder="Teléfono" required><br><br>

    <input type="file" name="foto" required><br><br>

    <input type="email" name="email" placeholder="Email"><br><br>

    <input type="text" name="direccion" placeholder="Dirección"><br><br>

    <textarea name="notas" placeholder="Notas"></textarea><br><br>

    <button type="submit">Guardar</button>

</form>

<a href="index.php"> Volver</a>

</body>
</html>
