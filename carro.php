<?php
require_once('db_config.php');

$sql = "SELECT c.cantidad, p.descripcionproducto, p.codigoproducto, p.pre_venta, p.idproducto FROM carrito c INNER JOIN producto p where p.idproducto = c.producto_id and c.cantidad >=1";
$resultado = $conn->query($sql);
$precio_total=0;
$sumar=1;
$restar=2;
$borrar=3;
$titulo = 'Lista';
$contenido = '
<br><br>
<div class="container" id="body">
    <div class="row">
      <div class="col">
        <div class="table table-scroll">
        <table class="table table-striped">
            <thead>
            <th>Codigo</th>
            <th>Descripci&oacuten</th>
            <th>Cantidad</th>
            <th>$/unidad</th>
            <th>Total</th>
            <th></th>
            <th></th>
            <th></th>
            </thead>';
                while ($fila = $resultado->fetch_assoc()) {
                $precio_parcial = $fila['cantidad'] * $fila['pre_venta'];
                $precio_total = $precio_total + $precio_parcial;
                $contenido .='
            <tbody><tr>     
                <td>'.$fila['codigoproducto'].'</td>
                <td>'.$fila['descripcionproducto']. '</td>
                <td>'.$fila["cantidad"].'</td>
                <td>'.$fila['pre_venta']. '</td>
                <td>'.$precio_parcial.'</td>
                <td><a href="accion_carro.php?id='.$fila['idproducto'].'&accion='.$sumar.'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar">
                    <i class="fas fa-plus"></i>
                </a></td>
                <td><a href="accion_carro.php?id='.$fila['idproducto'].'&accion='.$restar.'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sacar">
                    <i class="fas fa-minus"></i>
                </a></td> 
                <td><a href="accion_carro.php?id='.$fila['idproducto'].'&accion='.$borrar.'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Eliminar"> <i class="fas fa-trash"></i></a></td>
            </tr></tbody>';

}
$contenido .= '
    </table>
    </div>
     </div>
      </div>
      </br>
    <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label>TOTAL:</label></br>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input class="form-control" value="'.$precio_total.'"></br>
                </div>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <form method="post" action="limpiar_carro.php">
                    <button class="btn btn-primary" type="submit" value="Limpiar">Limpiar</button></br></div>
                </form>
            <div class="col-md-2"></div>
    </div></div>';
    

include 'template.php';
?>