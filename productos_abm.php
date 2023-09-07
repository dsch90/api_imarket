<?php
require_once('db_config.php');

// Manejar el filtro si se envía por el formulario
$tipo_filtro = isset($_POST["tipo_filtro"]) ? $_POST["tipo_filtro"] : "descripcion";
$valor_filtro = isset($_POST["valor_filtro"]) ? $_POST["valor_filtro"] : "";

// Construir la consulta SQL con filtro dinámico
$sql = "SELECT p.idproducto, p.descripcionproducto, p.codigoproducto, c.nombrecategoria, p.pre_venta, p.pre_sug_venta,p.pre_desc_may, p.pre_may_cant, p.pre_may_unidad, p.stock, p.estado, p.fecha_ult_act, p.comentario 
 FROM producto p INNER JOIN categoria c ON p.categoriaproducto = c.idcategoria WHERE 1=1";

if (!empty($valor_filtro)) {
    if ($tipo_filtro == "descripcion") {
        $sql .= " AND descripcionproducto LIKE '%$valor_filtro%' ORDER BY p.descripcionproducto";
    } 
    elseif ($tipo_filtro == "categoria") {
        $sql .= " AND c.nombrecategoria LIKE '%$valor_filtro%' ORDER BY p.descripcionproducto";
    }
    elseif ($tipo_filtro == "codigo") {
        $sql .= " AND codigoproducto LIKE '%$valor_filtro%' ORDER BY p.descripcionproducto";
    }
}


$resultado = $conn->query($sql);
$titulo = "Productos";
$contenido = '
<div class="container">
    <h2>Listado de Productos</h2>
    <div class="container mt-5">
        <form method="post" action="" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="tipo_filtro" class="sr-only">Filtrar:</label>
                <select class="form-control" id="tipo_filtro" name="tipo_filtro">
                    <option value="descripcion">Descripci&oacuten art&iacuteculo</option>
                    <option value="categoria">Categoria</option>
                    <option value="codigo">C&oacutedigo</option>
                </select>
                <br><br>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input class="form-control" type="text" id="valor_filtro" name="valor_filtro" value="'.$valor_filtro.'">   
            </div> 
            <div class="form-group  mx-sm-3 mb-2">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search" type="submit"></i>
                </button>
            </div> 
        </form>
    </div>
    <div class="container mt-5">';
        
          if (isset($_GET['mensaje'])) {
            $mensaje = $_GET['mensaje'];
            $contenido.= '<script>alert("' . addslashes($mensaje) . '");</script>';
          }
        
      $contenido.='<div class="form-group mb-2 text-right">
            <a href="productos_add.php" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar producto">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-container table-responsive" id="fondo_tabla">
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                    <th class="text-sm">Cod</th>
                    <th class="text-sm">Descripcion</th>
                    <th class="text-sm">Cat</th>
                    <th class="text-sm">Pre_Venta</th>
                    <th class="text-sm">PreSV</th>
                    <th class="text-sm">PreDV</th>
                    <th class="text-sm">PreMYC</th>
                    <th class="text-sm">PreMYU</th>
                    <th class="text-sm">Stock</th>
                    <th class="text-sm">Actualizado</th>
                    <th class="text-sm">Comentario</th>
                    <th></th>
                    <th></th>
        
                        </tr>
                    </thead>';
        
                    // Iterar a través de los resultados y mostrar cada producto en una fila
                    while ($fila = $resultado->fetch_assoc()) {
                    $fecha_formateada=date('d/m/y', strtotime($fila['fecha_ult_act']));
                    $contenido .='
                    <tbody>
                    <tr>
                    <td>'.$fila['codigoproducto'].'</td>
                    <td>'.$fila['descripcionproducto']. '</td>
                    <td>'.$fila['nombrecategoria']. '</td>
                    <td>'.$fila['pre_venta']. '</td>
                    <td>'.$fila['pre_sug_venta'].'</td>
                    <td>'.$fila['pre_desc_may']. '</td>
                    <td>'.$fila['pre_may_cant']. '</td>
                    <td>'.$fila['pre_may_unidad']. '</td>
                    <td>'.$fila['stock']. '</td>
                    <td>'.$fecha_formateada.'</td>
                    <td>'.$fila['comentario']. '</td>
                    <td><a href="productos_edit.php?id='.$fila['idproducto'].'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a></td> 
                    <td><a href="productos_delete.php?id='.$fila['idproducto'].'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Eliminar"> <i class="fas fa-trash"></i></a></td> 
                    </tr>
                    </tbody>'; 
                    }   
                    $contenido .='  
                </table>
            </div>
        </div>    
    </div> 
</div>';
include 'template.php';
?>