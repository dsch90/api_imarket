<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('db_config.php');

    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT idusuario, permiso, nombre FROM usuario WHERE nombre = '$nombre_usuario' AND password = '$contrasena'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $_SESSION["usuario_id"] = $fila["idusuario"];
        $_SESSION["permiso"] = $fila["permiso"];
        $_SESSION["nombre"] = $fila["nombre"];
        if($_SESSION["permiso"] == 1){
        header("Location: productos_abm.php"); // Redirige a la página de inicio tras el inicio de sesión exitoso
        }else{
        header("Location: productos.php");// Redirige a la página de productos tras el inicio de sesión exitoso
        }
    } else {
        $mensaje_error = "Nombre de usuario o contraseña incorrectos";
    }
}
$titulo = "Login"
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titulo; ?></title>
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="estilo_productos.css">
</head>
<body class="principal">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">I-MARKET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
    <?php if(isset($mensaje_error)) { echo "<p>$mensaje_error</p>"; } ?>
                    <div class="card-body">
                        <form method="POST" action="login.php">
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="nombre_usuario"  name="nombre_usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>