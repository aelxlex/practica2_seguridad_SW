<?php
// Inicializar variable para el comentario
$comentario_escapado = '';

// Comprobar si el formulario ha sido enviado
if (isset($_POST['comentario'])) {
    // Obtener el comentario ingresado por el usuario
    $comentario_usuario = $_POST['comentario'];

    // Sanitizar y escapar el comentario para prevenir XSS
    $comentario_escapado = htmlspecialchars($comentario_usuario, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Directiva CSP para limitar el origen de scripts -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
    <title>Ejemplo de Prevención XSS</title>
</head>
<body>
    <h1>Comentarios de Usuarios</h1>
    <form action="" method="POST">
        <label for="comentario">Escribe tu comentario:</label>
        <input type="text" id="comentario" name="comentario">
        <button type="submit">Enviar</button>
    </form>
    <h2>Comentarios</h2>
    <div id="comentarios">
        <!-- Mostrar el comentario escapado para prevenir XSS -->
        <?php
        // Mostrar el comentario solo si se ha enviado
        if (!empty($comentario_escapado)) {
            echo "<p>" . $comentario_escapado . "</p>";
        }
        ?>
    </div>
</body>
</html>
