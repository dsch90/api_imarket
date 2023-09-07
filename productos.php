<?php
require_once('db_config.php');

// Manejar el filtro si se envía por el formulario
$tipo_filtro = isset($_POST["tipo_filtro"]) ? $_POST["tipo_filtro"] : "descripcion";
$valor_filtro = isset($_POST["valor_filtro"]) ? $_POST["valor_filtro"] : "";

// Construir la consulta SQL con filtro dinámico
$sql = "SELECT p.idproducto, p.descripcionproducto, p.codigoproducto, c.nombrecategoria, p.pre_venta
 FROM producto p INNER JOIN categoria c ON p.categoriaproducto = c.idcategoria WHERE 1=1";

if (!empty($valor_filtro)) {
    if ($tipo_filtro == "descripcion") {
        $sql .= " AND p.descripcionproducto LIKE '%$valor_filtro%'";
    } 
    elseif ($tipo_filtro == "categoria") {
        $sql .= " AND c.nombrecategoria LIKE '%$valor_filtro%'";
    }
    elseif ($tipo_filtro == "codigo") {
        $sql .= " AND p.codigoproducto LIKE '%$valor_filtro%'";
    }
}

$resultado = $conn->query($sql);


$titulo = "Productos";
$contenido = '
<div class="container">
    <h2>Listado de Productos</h2>
    <div class="container mt-5" id="div-fijo">
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
                <select class="form-control" id="tipo_filtro" name="tipo_filtro">
                    <option value="descripcion">Descripci&oacuten art&iacuteculo</option>
                    <option value="categoria">Categoria</option>
                    <option value="codigo">C&oacutedigo</option>
                </select>
               
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
    <div class="container">
        <div class="row">
        <div class="table_container table-responsive" id="fondo_tabla">
            <table class="table table-sm table-striped">
            <thead>
            <tr>
            <th>C&oacutedigo</th>
            <th>Descripci&oacuten</th>
            <th>Categoria</th>
            <th>Precio_Venta</th>
            <th></th>
            </tr>
            </thead>';
            // Iterar a través de los resultados y mostrar cada producto en una fila
            while ($fila = $resultado->fetch_assoc()) {
            $contenido .='
            <tbody>
            <tr>     
                <td>'.$fila['codigoproducto'].'</td>
                <td>'.$fila['descripcionproducto']. '</td>
                <td>'.$fila['nombrecategoria']. '</td>
                <td>'.$fila['pre_venta']. '</td>
                <td><a href="agregar_carro.php?id='.$fila['idproducto'].'" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Agregar a lista">
            <i class="fas fa-plus"></i>
            </a></td> 
            </tr> 
            </tbody>';
            }
            $contenido .='</table>
        </div>
        </div>    
    </div>
    </div>  
</div>';
    include 'template.php';
?>