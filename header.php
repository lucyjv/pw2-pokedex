<?php
session_start();
$logueado = isset($_SESSION['usuario']);
?>

<html lang="es">
<header>
    <a href="index.php"><img src="img/images.png" alt="Logo Pokémon"></a>
    <h1>Pokédex</h1>
    <?php if (!$logueado): ?>
        <form class="login-form" method="POST" action="procesar_login.php">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasenia" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    <?php else: ?>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> | <a href="logout.php">Cerrar sesión</a></p>
    <?php endif; ?>
</header>
</html>
