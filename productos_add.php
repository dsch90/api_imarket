<?php
require_once('db_config.php');
$titulo = 'Agregar Producto';
$contenido = '<div class="container mt-5"> 
        <h2>Agregar Producto</h2>
        
        <form method="post" action="productos_agregado.php">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nueva_descripcion">Descripcion:</label>
                    <input class="form-control" type="text" id="nueva_descripcion" name="nueva_descripcion" required>
                </div>
                <div class="form-group">
                    <label for="nueva_codigo">Codigo:</label>
                    <input class="form-control" type="number" id="nueva_codigo" name="nueva_codigo" required>
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
                <input class="form-control" type="number" id="nuevo_stock" name="nuevo_stock">
            </div>
            <div class="form-group">
                <label for="nuevo_estado">Estado:</label>
                <input class="form-control" type="number" id="nuevo_estado" name="nuevo_estado">
            </div>
            <div class="form-group">
                <label for="nuevo_comentario">Comentario:</label>
                <input class="form-control" type="text" id="nuevo_comentario" name="nuevo_comentario">
            </div> 
        </div>

        <div class="col-md-4">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="nuevo_precio_venta">Precio_Venta:</label>
                <input class="form-control" type="number" id="nuevo_precio_venta" name="nuevo_precio_venta" required>
            </div>
            <div class="form-group">
                <label for="nuevo_precio_sug_venta">Precio_sug_venta: $</label>
                <input class="form-control" type="number" id="nuevo_precio_sug_venta" name="nuevo_precio_sug_venta">
            </div>
            <div class="form-group">
                <label for="nuevo_precio_sug_venta">Precio_sug_venta: $</label>
                <input class="form-control" type="number" id="nuevo_precio_sug_venta" name="nuevo_precio_sug_venta">
            </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">    
                        <label for="nuevo_precio_desc_venta">Precio_desc_venta: $</label>    
                        <input class="form-control" type="number" id="nuevo_precio_desc_venta" name="nuevo_precio_desc_venta">     
                    </div>      
                    <div class="form-group">        
                        <label for="nuevo_precio_may_cant">Precio_may_cant: $</label>     
                        <input class="form-control" type="number" id="nuevo_precio_may_cant" name="nuevo_precio_may_cant">      
                    </div>      
                    <div class="form-group">        
                        <label for="nuevo_pre_may_unidad">Precio_may_unidad: $</label>        
                        <input class="form-control" type="number" id="nuevo_pre_may_unidad" name="nuevo_pre_may_unidad">   
                    </div>
                </div>
            </div>
        </div>
                
        </div>
        <button  class="btn btn-primary" type="submit" value="Agregar">Agregar</button>
    </form></div>';
    include 'template.php';
?>