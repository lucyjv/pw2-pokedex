<?php
session_start();
$logueado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #ffcb05;
        }
        header img {
            height: 50px;
        }
        header h1 {
            font-size: 36px;
            color: #3d7216;
            margin: 0;
        }
        .login-form {
            display: flex;
            gap: 10px;
        }
        .login-form input {
            padding: 5px;
        }
        .search-section {
            text-align: center;
            margin-top: 50px;
        }
        .search-section input {
            padding: 10px;
            width: 200px;
            margin-right: 10px;
        }
        .search-section button {
            padding: 10px 15px;
            background-color: #3d7216;
            color: white;
            border: none;
            cursor: pointer;
        }
        .search-section button:hover {
            background-color: #2b4e0d;
        }
        .error-message {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<header>
    <img src="img/Pokedex+tool-1320568182154727832_512px.png" alt="Logo Pokémon">
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

<?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <div class="error-message">Credenciales incorrectas.</div>
<?php endif; ?>

<div class="search-section">
    <input type="text" placeholder="Buscar Pokémon por nombre, tipo o número">
    <button>Buscar</button>
</div>

</body>
</html>

