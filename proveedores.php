<?php
require_once('db_config.php');

$sql = "SELECT * FROM proveedores WHERE 1=1 ORDER BY nombreproveedor ASC";

$resultado = $conn->query($sql);

$titulo = "Productos";
$contenido = '<div class="container">
    <h2>Listado de Proveedores</h2>
    <div class="container mt-5">
        <form method="post" action="" class="form-inline">
        </form>
    </div>
    
    <div class="form-group mb-2 text-right">
        <a href="proveedor_add.php" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar proveedor">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Nombre</th>
            </tr>';
            while ($fila = $resultado->fetch_assoc()) {
                $contenido .='
            <tr>
                <td>'.$fila['nombreproveedor'].'</td>
            </tr>';
            }
 $contenido .='</table>    
    </div>  
    </div>  
</body>
</html>';
include 'template.php';
?>