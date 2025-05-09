<?php
global $logueado, $conexion;

// Se conecta con la base de datos

require_once('conexion.php');


$busqueda = "";
$mensajeError = "";
$mostrarTodos = false;

if (isset($_GET['busqueda'])) {
    $busqueda = $conexion->real_escape_string($_GET['busqueda']);
}

// Ejecutar consulta
if (!empty($busqueda)) {
    $sql = "SELECT * FROM pokemon WHERE LOWER(nombre) LIKE LOWER('%$busqueda%') OR numero = '$busqueda'";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows === 0) {
        $mensajeError = "No se encontró ningún Pokémon con ese nombre o numero. Mostrando todos los Pokémon.";
        // Mostrar todos
        $sql = "SELECT * FROM pokemon";
        $resultado = $conexion->query($sql);
    }
} else {
    $sql = "SELECT * FROM pokemon";
    $resultado = $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<?php include("header.php"); ?>

<?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <div class="error-message">¡Los datos no coinciden con ningún admin!</div>
<?php endif; ?>

<?php if (isset($_GET['error']) && $_GET['error'] == 2): ?>
    <div class="error-message">¡Los campos ingresados están vacíos!</div>
<?php endif; ?>

<?php if (isset($_GET['eliminado'])): ?>
    <div class="mensaje-confirmacion" style="text-align:center; color: <?php echo $_GET['eliminado'] == 1 ? 'green' : 'red'; ?>;">
        <?php echo $_GET['eliminado'] == 1 ? '¡Pokémon eliminado correctamente!' : 'Error al eliminar el Pokémon.'; ?>
    </div>
<?php endif; ?>


<div class="search-section">
    <form method="GET" action="index.php">
        <input type="text" name="busqueda" placeholder="Buscar Pokémon por nombre" value="<?php echo htmlspecialchars($busqueda); ?>">
        <button type="submit">Buscar</button>

    </form>

    <?php if (!empty($mensajeError)): ?>
        <p class="mensaje-error" style="text-align:center; color: red;"><?php echo $mensajeError; ?></p>
    <?php endif; ?>

</div>



<?php
// Mostrar pokemones
if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<thead>
            <tr>
                <th>Imagen</th>
                <th>Número</th>
                <th>Nombre</th>
                <th>Tipo 1</th>
                <th>Tipo 2</th>";
    if ($logueado) {
        echo "<th>Opciones Admin</th>";
    }
    echo "</tr>
        </thead>";
    echo "<tbody>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img class='pokemon' src='" . htmlspecialchars($fila['imagen']) . "' alt='" . htmlspecialchars($fila['nombre']) . "'></td>";
        echo "<td>#" . htmlspecialchars($fila['numero']) . "</td>";
        echo "<td><a class='link-nombre' href='detalle.php?numero=" . htmlspecialchars($fila['numero']) ."'>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td><img class='tipo' src='" . htmlspecialchars($fila['tipo1']) . "' alt='Tipo 1'></td>";
        echo "<td>";
        if ($fila['tipo2'] != NULL) {
            echo "<img class='tipo' src='" . htmlspecialchars($fila['tipo2']) . "' alt='Tipo 2'>";
        } else {
            echo "-";
        }
        echo "</td>";

        if ($logueado) {
            echo "<td>
                    <button onclick=\"window.location.href='editarPokeForm.php?id_incremental=" . urlencode($fila['id_incremental']) . "'\" class='boton-editar'>Editar</button>
                    <button onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este Pokémon?')) window.location.href='eliminarPoke.php?nombre=" . urlencode($fila['nombre']) . "'\" class='boton-eliminar'>Eliminar</button>
                  </td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";

} else {
    echo "<p style='text-align:center;'>No se encontró ningún Pokémon con ese nombre.</p>";
}

if ($logueado) {
    echo '<button onclick="window.location.href=\'agregarPokeForm.php\'" class="boton-agregar">Agregar un nuevo Pokémon</button>';
}
?>

</body>
</html>
