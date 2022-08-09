<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Página web Hefestos</title>
	<link rel="stylesheet" href="vistas/css/estilos.css">
	<!--================================================
	ESTILOS
	=================================================-->
	<!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="vistas/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="vistas/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">




<!--================================================
	PLUGINS
	=================================================-->

	

	<!-- jQuery, Popper.js, Bootstrap JS -->
	<script src="vistas/jquery/jquery-3.3.1.min.js"></script>
    <script src="vistas/popper/popper.min.js"></script>
    <script src="vistas/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- sweetAlert 2 -->
  	<script src="vistas/plugins/sweetalert2/sweetalert2.all.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="vistas/datatables/datatables.min.js"></script>   


	
	

       
	

      


     
           
 

	
	
	<script src="https://kit.fontawesome.com/fb8d00e6ad.js" crossorigin="anonymous"></script>
</head>

<body class="hidden login-page">
		
	<?php

            
			
            if(!isset($_GET["ruta"])){ 
				
				include "modulos/prelo.php";
				// head  
				include "modulos/head.php";            
				//main
				include "modulos/main.php";
				//products
				include "modulos/products.php";
				//footer
				include "modulos/footer.php";                
            }
           //login
            if(isset($_GET["ruta"])){ 				
				         
				if ($_GET["ruta"] == "Login" ||
				$_GET["ruta"] == "listaInventario" ||
				$_GET["ruta"] == "nosotros" ||
				  $_GET["ruta"] == "servicio" ) {              
					include "modulos/".$_GET["ruta"].".php";
		  }
			}

			if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
			echo'<div class="Wrapper">';
			if(!isset($_GET["ruta"])){ 	
			
				include "modulos/wellcome.php";		}
				
			if(isset($_GET["ruta"])){ 
				         
				if ($_GET["ruta"] == "wellcome" ||
					   $_GET["ruta"] == "serviceP" ||				
					   $_GET["ruta"] == "usuarios" ||
					   $_GET["ruta"] == "proveedores" ||
					   $_GET["ruta"] == "inventario" || 
					   $_GET["ruta"] == "categoria" ||
					   $_GET["ruta"] == "salir" )  
					   {              
						 include "modulos/".$_GET["ruta"].".php";
			   }
		   }
                  
				echo '</div>';

		}
            ?>



	  
   
    <script src="vistas/js/jquery.js"></script>
    <script src="vistas/js/main.js"></script>
    <script src="vistas/js/filtro.js"></script>
	<script src="vistas/js/usuarios.js"></script>
	<script src="vistas/js/categorias.js"></script>
 
	

	<!-- sweet alert2 -->
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script type="text/javascript" src="vistas/js/main.js"></script> 



	


</body>

</html>