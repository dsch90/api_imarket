<?php  

$titulo = 'Index';
$contenido='<title>Bienvenido a I-MARKET</title>
        </head>
        <body>
        <h2>Hola</h2>
        </body>'; 
include 'template.php'; 
    if(isset($_SESSION['usuario_id'])) { 
              $contenido.= $_SESSION['nombre'];
                  
    }else 
    {            
        header("Location: login.php");                      
    }

?>