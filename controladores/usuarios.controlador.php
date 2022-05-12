<?php

class ControladorUsuarios{


//metodo publico ingreso de usuarios al login
static public function ctrIngresoUsuario(){




	
	if(isset($_POST["ingUsuario"])){

		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
		preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
				//usuario encriptado
			$encriptar= crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

			$tabla ="empleados";
			$item = "usuario";//variable
			$valor =  $_POST["ingUsuario"];

			$respuesta = ModeloUsuarios :: MdlMostrarUsuarios($tabla, $item, $valor);

			if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){//solicitud de respuesta

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["perfil"] = $respuesta["perfil"];

					echo ' <script>
					window.location = "wellcome";
					</script>';

				}else {

					echo '<br><div class="alert alert-danger">Error al ingresar, intenta de nuevo</div>';

					}
				}

			}

	
	}

	//crear usuario

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){


				//validar imagen

				$ruta="";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto)= getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho= 500;
					$nuevoAlto= 500;

					//crear directorio de almacenamientode foto

					$directorio="vistas/img/usuarios/". $_POST["nuevoUsuario"];
					mkdir($directorio, 0755);
					// de acuerdo al tipo de imagen se aplicaran las siguietnes funciones por defecto de php

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
						//guardar imagen en le directorio
						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/". $_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
						
						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){
						//guardar imagen en le directorio

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/". $_POST["nuevoUsuario"]."/".$aleatorio.".png";
						
						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}


				}

				$tabla = "empleados";

				$encriptar= crypt($_POST["nuevoPassword"], '$2a$07$usesomesillystringforsalt$');

				$datos = array("nombre" =>$_POST["nuevoNombre"],
							   "usuario" =>$_POST["nuevoUsuario"],
							   "password" =>$encriptar,
							   "perfil" =>$_POST["nuevoPerfil"],
							"foto"=>$ruta);

				$respuesta = ModeloUsuarios :: mdlIngresarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title:"¡El usuario a sido ingresado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

						}).then((result)=>{

							if(result.value){

							window.location="usuarios";

							}

								});


					</script>';


							   }

			}else{

				echo '<script>

				Swal.fire({

					type: "error",
					title:"¡El usuario no puede estar vacio o tener caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false

				}).then((result)=>{

					if(result.value){

						window.location="usuarios";

					}

				});


				</script>';
			}			

		}
	}

	/*=================================================
	Mostrar Usuarios
	=================================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "empleados";
		$respuesta = ModeloUsuarios :: MdlMostrarUsuarios($tabla, $item, $valor);
			
		return $respuesta;
	}
	
}