<ul>
    <li><a href="index.php">Inicio</a></li>
    <?php
    session_start();
    if(isset($_SESSION["permiso"])){
        if($_SESSION["permiso"] == 1){
            echo '<li><a href="productos_amb.php">Productos</a></li><li><a href="proveedores.php">Proveedores</a></li>';
        } else {
            echo '<li><a href="productos.php">Productos</a></li>';
        }
    }
    if(isset($_SESSION["usuario_id"])) {
        echo '<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>';
    } else {
        echo '<li><a href="login.php">Iniciar Sesión</a></li>';
        echo '<li><a href="registro.php">Registrarse</a></li>';
    }
    ?>
</ul>