<?php
// Conexión a la base de datos
require_once('db_config.php');

// Obtener el ID del producto a editar
$id_producto = $_GET["id"];

// Manejar la actualización si se envía por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nueva_codigo = $_POST["nueva_codigo"];
    $nueva_descripcion = $_POST["nueva_descripcion"];
    $nueva_categoria = $_POST["nueva_categoria"];
    $nuevo_precio_venta = $_POST["nuevo_precio_venta"];
    $nuevo_estado = $_POST["nuevo_estado"];
    $nuevo_stock = $_POST["nuevo_stock"];
    $nuevo_precio_venta = $_POST["nuevo_precio_venta"];
    $nuevo_precio_sug_venta = $_POST["nuevo_precio_sug_venta"];
    $nuevo_precio_may_cant = $_POST["nuevo_precio_may_cant"];
    $nuevo_precio_desc_venta = $_POST["nuevo_precio_desc_venta"];
    $nuevo_pre_may_unidad = $_POST["nuevo_pre_may_unidad"];
    $nuevo_comentario = $_POST["nuevo_comentario"];

    $sql = "UPDATE producto SET codigoproducto = '$nueva_codigo', descripcionproducto = '$nueva_descripcion',  comentario='$nuevo_comentario', categoriaproducto = '$nueva_categoria' WHERE idproducto = $id_producto";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Obtener los datos actuales del producto
$sql_producto = "SELECT * FROM producto WHERE idproducto = $id_producto";
$resultado_producto = $conn->query($sql_producto);
$producto = $resultado_producto->fetch_assoc();


$titulo = 'Actualizar producto';
$contenido ='<form method="post" action="productos_agregado.php">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nueva_descripcion">Descripcion:</label>
                    <input class = "form-control" type="text" id="nueva_descripcion" name="nueva_descripcion" value="'.$producto['descripcionproducto'].'" required>
                </div>
                <div class="form-group">
                    <label for="nueva_codigo">Codigo:</label>
                    <input class="form-control" type="number" id="nueva_codigo" name="nueva_codigo" value="'.$producto['codigoproducto'].'">
                </div>
                <div class="form-group">
                    <label for="nueva_categoria">Categoria:</label>
                    <select class="form-control" id="nueva_categoria" name="nueva_categoria">';
                    
                    
                    // Consulta SQL para obtener las categorías
                    $sql = "SELECT idcategoria, nombrecategoria FROM categoria";
                    $result = $conn->query($sql);

                    // Generar opciones para el select
                    while ($row = $result->fetch_assoc()) {
                        $contenido .= "<option value='" . $row["idcategoria"] . "'id='nueva_categoria' name='nueva_categoria'>" . $row["nombrecategoria"] . "</option>";
                    }  
                $contenido .= '</select>
                </div>
            
            </div>        
        <div class="col-md-4">
            <div class="form-group">
                <label for="nuevo_stock">Stock:</label>
                <input class="form-control" type="number" id="nuevo_stock" name="nuevo_stock" value="'.$producto['stock'].'">
            </div>
            <div class="form-group">
                <label for="nuevo_estado">Estado:</label>
                <input class="form-control" type="number" id="nuevo_estado" name="nuevo_estado" value ='.$producto['estado'].'>
            </div>
            <div class="form-group">
                <label for="nuevo_comentario">Comentario:</label>
                <input class="form-control" type="text" id="nuevo_comentario" name="nuevo_comentario" value="'.$producto['comentario'].'">
            </div> 
        </div>

        <div class="col-md-4">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="nuevo_precio_venta">Precio_Venta:</label>
                <input class="form-control" type="number" id="nuevo_precio_venta" name="nuevo_precio_venta" value="'.$producto['pre_venta'].'" required>
            </div>
            <div class="form-group">
                <label for="nuevo_precio_sug_venta">Precio_sug_venta: $</label>
                <input class = "form-control" type="number" id="nuevo_precio_sug_venta" name="nuevo_precio_sug_venta" value="'.$producto['pre_sug_venta'].'">
            </div>
            <div class="form-group">
                <label for="nuevo_precio_desc_venta">Precio_desc_venta:</label>
                <input class="form-control" type="number" id="nuevo_precio_desc_venta" name="nuevo_precio_desc_venta" value="'.$producto['pre_desc_may'].'">
            </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">    
                        <label for="nuevo_precio_desc_venta">Precio_desc_venta: $</label>    
                        <input class= "form-control" type="number" id="nuevo_precio_desc_venta" name="nuevo_precio_desc_venta" value="'.$producto['pre_desc_may'].'">     
                    </div>      
                    <div class="form-group">        
                        <label for="nuevo_precio_may_cant">Precio_may_cant: $</label>     
                        <input class="form-control" type="number" id="nuevo_precio_may_cant" name="nuevo_precio_may_cant" value="'.$producto['pre_may_cant'].'">      
                    </div>      
                    <div class="form-group">        
                        <label for="nuevo_pre_may_unidad">Precio_may_unidad: $</label>        
                        <input class="form-control" type="number" id="nuevo_pre_may_unidad" name="nuevo_pre_may_unidad" value="'.$producto['pre_may_unidad'].'">   
                    </div>
                </div>
            </div>
        </div>
                
        </div>
        <button  class="btn btn-primary" type="submit" value="Actualizar">Actualizar</button>
    </form>';

include 'template.php';
?>