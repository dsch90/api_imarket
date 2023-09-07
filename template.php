<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titulo; ?></title>
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="estilo_productos.css">
    <link rel="icon" href="icono.jfif">


</head>
<body class="principal">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="Nav">
        <a class="navbar-brand" href="index.php">I-MARKET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <?php
                session_start();
                if(isset($_SESSION["permiso"])){
                    if($_SESSION["permiso"] == 1){
                        echo '<li class="nav-item active"><a class="nav-link"  href="productos_abm.php">Productos</a></li><li class="nav-item"><a class="nav-link" href="proveedores.php">Proveedores</a></li>';            
                    } else {            
                        echo'<li class="nav-item active"><a class="nav-link"  href="productos.php">Productos</a></li> 
                        <li class="nav-item active"><a class="nav-link"  href="carro.php">Ticket</a></li>';            
                    }            
                }            
                if(isset($_SESSION["usuario_id"])) {            
                    echo '</ul><span class="navbar-link">
                    <a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a></span>
                    ';            
                }else 
                {            
                    echo '</ul><span class="navbar-link">
                    <a class="nav-link" href="login.php">Iniciar Sesión</a>
                    </span>';                        
                }
                ?>
    	</div>
    </nav>

    <div class="container mt-4">
        <?php echo $contenido; ?>
    </div>

    <footer class="footer mt-auto py-3 bg-light" id="Footer">
        <div class="container">
            <span class="text-muted">© <?php echo date("Y"); ?> ChDebora. Todos los derechos reservados.</span>
        </div>
    </footer>

    <!-- Incluir los archivos JavaScript de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
