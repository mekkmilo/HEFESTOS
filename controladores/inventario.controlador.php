<?php 

class ControladorInventario{

/*===============================
Mostrar productos
===============================*/

    static public function ctrMostrarInventario($item, $valor){


        $tabla= "portafolio";

        $respuesta = ModeloInventario::mdlMostrarInventario($tabla, $item, $valor);

        return $respuesta;

    }


    //crear producto

    static public function ctrCrearProducto(){

        if(isset($_POST["nuevaDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])&&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])&&
            preg_match('/^[0-9]+$/', $_POST["nuevoPrecioCompra"])){


                 //validar imagen
                
               $ruta = "vistas/img/portafolio/man.png";
              

               if(isset($_FILES["nuevaImagen"]["tmp_name"])){

                list($ancho, $alto)= getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

                $nuevoAncho= 500;
                $nuevoAlto= 500;

                /*  ===============================
                crear directorio de almacenamientode foto
              ======================================================*/

                $directorio="vistas/img/portafolio/". $_POST["nuevoCodigo"];
                mkdir($directorio, 0755);

                /*================================
                de acuerdo al tipo de imagen se aplicaran las siguietnes funciones por defecto de php
                =====================================================================================*/

                if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){
                    //guardar imagen en le directorio
                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/portafolio/". $_POST["nuevoCodigo"]."/".$aleatorio.".jpg";
                    
                    $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if($_FILES["nuevaImagen"]["type"] == "image/png"){
                    //guardar imagen en le directorio

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/portafolio/". $_POST["nuevoCodigo"]."/".$aleatorio.".png";
                    
                    $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);
                    
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }


            }

               $tabla = "portafolio"; 

               $datos = array ("id_categoria" => $_POST["nuevaCategoria"],
                               "codigo" => $_POST["nuevoCodigo"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                               "nombre" => $_POST["nuevoNombre"],
                               "precio" => $_POST["nuevoPrecioCompra"],
                               "imagen" => $ruta);

                $respuesta = ModeloInventario :: mdlIngresarProducto($tabla, $datos);

                if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title:"¡Producto registrado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){

							window.location="inventario";

							}

								});


					</script>';


							   

            }else{

                echo '<script>

				Swal.fire({

					type: "error",
					title:"¡El producto no puede estar vacio o tener caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false

				}).then((result)=>{

					if(result.value){

						window.location="inventario";

					}

				});


				</script>';

            }
            
        }

    }
   

}

}