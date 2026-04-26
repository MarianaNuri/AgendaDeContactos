<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="/AgendaDeContactos/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

<header class="main-header">
    <div class="header-content">
        <!-- boton para abrir el menú -->
        <button class="menu-toggle" id="menuToggleBtn" onclick="toggleSidebar()" aria-label="Abrir menú">
            <span class="icon-line"></span>
            <span class="icon-line"></span>
            <span class="icon-line"></span>
        </button>

        <h1>
            <i class="bi bi-journal-bookmark-fill"></i>
            Agenda de Contactos
        </h1>

        <nav class="header-nav-desktop">
            <a href="index.php">Inicio</a>
            <a href="crear.php">Nuevo</a>
        </nav>
    </div>
</header>

<!-- Overlay oscuro al abrir sidebar -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<?php include("includes/menu.php"); ?>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const btn     = document.getElementById('menuToggleBtn');

        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
        btn.classList.toggle('active');
    }
</script>