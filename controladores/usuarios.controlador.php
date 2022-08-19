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

				if($respuesta["estado"] == 1){

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["perfil"] = $respuesta["perfil"];


					/*================================
					Registrar ultimo login
					================================*/

					date_default_timezone_set('America/Bogota');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');

					$fechaActual = $fecha.' '.$hora;

					$item1 = "ultimo_login";
					$valor1 = $fechaActual;

					$item2 = "id";
					$valor2= $respuesta["id"];

					$ultimoLogin = ModeloUsuarios :: mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

					if($ultimoLogin == "ok"){

						echo ' <script>
						     window.location = "wellcome";
						</script>';

					}


					
				}else{

					echo '<br><div class="alert alert-danger">Usuario desactivado!</div>';
				}

				}else {

					echo '<br><div class="alert alert-danger">Error al ingresar, Intentar nuevamente</div>';

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

	/*=================================================
	Editar Usuarios
	=================================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){


			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){
				

				//validar imagen

				$ruta= $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto)= getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho= 500;
					$nuevoAlto= 500;

					//crear directorio de almacenamientode foto

					$directorio="vistas/img/usuarios/". $_POST["editarUsuario"];

					//pregunta si hay foto existente a reemplazar

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}


					
					// de acuerdo al tipo de imagen se aplicaran las siguientes funciones por defecto de php

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){
						//guardar imagen en le directorio
						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/". $_POST["editarUsuario"]."/".$aleatorio.".jpg";
						
						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if($_FILES["editarFoto"]["type"] == "image/png"){
						//guardar imagen en le directorio

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/". $_POST["editarUsuario"]."/".$aleatorio.".png";
						
						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}


				}

				$tabla = "empleados";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar= crypt($_POST["editarPassword"], '$2a$07$usesomesillystringforsalt$');	

					}else{

						echo '<script>

				Swal.fire({

					type: "error",
					title:"¡La Contraseña no puede estar vacia o tener caracteres especiales!",
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
					$encriptar= $passwordActual;	

				}

				$datos = array("nombre" =>$_POST["editarNombre"],
							   "usuario" =>$_POST["editarUsuario"],
							   "password" =>$encriptar,
							   "perfil" =>$_POST["editarPerfil"],
							   "foto"=>$ruta);

				$respuesta = ModeloUsuarios :: mdlEditarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					Swal.fire({

						type: "success",
						title:"¡El usuario a sido editado satisfactoriamente!",
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
					title:"¡El nombre no puede estar vacio o tener caracteres especiales!",
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

/*================================
borrar usuario 
 ================================*/

 static public function ctrBorrarUsuario(){

	if(isset($_GET["idUsuario"])){

		$tabla = "empleados";
		$datos = $_GET["idUsuario"];

		if($_GET["fotoUsuario"] != ""){

			unlink($_GET["fotoUsuario"]);
			rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

		}

		$respuesta = ModeloUsuarios :: mdlBorrarUsuario($tabla, $datos);

		if($respuesta == "ok"){

			echo '<script>

			Swal.fire({

				type: "success",
				title:"¡El Usuario se elimino correctamente!",
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

}