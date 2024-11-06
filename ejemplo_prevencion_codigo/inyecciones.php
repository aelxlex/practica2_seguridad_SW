<?php
// Conexión a la base de datos usando PDO
$dsn = 'mysql:host=localhost;dbname=seguridad_web;charset=utf8';
$username = 'root';
$password = '';

try {
    $conexion = new PDO($dsn, $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comprobamos si los datos sehan enviado por el formulario
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Consulta preparada para evitar inyección SQL
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
        $stmt = $conexion->prepare($sql);

        // Vinculación de parámetros
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Ejecución de la consulta
        $stmt->execute();

        // Comprobación de resultados
        if ($stmt->rowCount() > 0) {
            echo "Acceso concedido";
        } else {
            echo "Acceso denegado";
        }
    } else {
        echo "Por favor ingrese usuario y contraseña.";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

<center>
<form action="inyecciones.php" method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Ingresar</button>
</form>
</center>