<?php include("includes/header.php"); ?>

<div class="card">
    <h2>Nuevo Contacto</h2>

    <form action="guardar.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej. María" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ej. López">
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" placeholder="Ej. 555-123-4567" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <div class="file-wrapper">
                <span class="file-icon">📷</span>
                <span class="file-text">Haz clic o arrastra una imagen</span>
                <input type="file" id="foto" name="foto" accept="image/*" required>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ej. maria@correo.com">
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" placeholder="Ej. Calle Principal #123">
        </div>

        <div class="form-group">
            <label for="notas">Notas</label>
            <textarea id="notas" name="notas" placeholder="Escribe notas adicionales..."></textarea>
        </div>

        <button type="submit" class="btn-submit"><span>Guardar Contacto</span></button>

    </form>

    <a href="index.php" class="back-link">
        <span class="arrow">←</span> Volver a la agenda
    </a>
</div>

</body>
</html>
