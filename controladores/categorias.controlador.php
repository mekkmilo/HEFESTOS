<?php

class ControladorCategorias{

    /*=================================================
	crear categorias
	=================================================*/

    static public function ctrCrearCategoria() {

        if(isset ($_POST["nuevaCategoria"])){


            if(preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ ]+$/', $_POST["nuevaCategoria"])){

                $tabla = "categorias";
                $datos =  $_POST["nuevaCategoria"];
                $respuesta = ModeloCategorias :: mdlCrearCategoria($tabla, $datos);// la respuesta va al modelo y entra a la clase
                    if($respuesta == "ok"){

                        echo '<script>

                        Swal.fire({        
                            type: "success",
                            title:"¡Categoria guardada!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false        
                        }).then((result)=>{        
                            if(result.value){        
                                window.location="categoria";        
                            }        
                        });       
        
                        </script>';

                    }


            }else{
                
						echo '<script>

                        Swal.fire({
        
                            type: "error",
                            title:"¡La Categoria no puede estar vacia o tener caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
        
                        }).then((result)=>{
        
                            if(result.value){
        
                                window.location="categoria";
        
                            }
        
                        });        
        
                        </script>';
            }

        }

    }

       /*=================================================
	mostrar categorias
	=================================================*/
    
    static public function ctrMostrarCategorias($item, $valor){

        $tabla = "categorias";

        $respuesta = ModeloCategorias :: mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;

    }


     /*=================================================
	editar categorias
	=================================================*/

    static public function ctrEditarCategoria() {

        if(isset ($_POST["editarCategoria"])){


            if(preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ ]+$/', $_POST["editarCategoria"])){

                $tabla = "categorias";
                $datos =  array ("categoria" => $_POST["editarCategoria"],
                                 "id"=>$_POST["idCategoria"]);
                $respuesta = ModeloCategorias :: mdlEditarCategoria($tabla, $datos);// la respuesta va al modelo y entra a la clase
                    if($respuesta == "ok"){

                        echo '<script>

                        Swal.fire({        
                            type: "success",
                            title:"¡Categoria editada!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false        
                        }).then((result)=>{        
                            if(result.value){        
                                window.location="categoria";        
                            }        
                        });       
        
                        </script>';

                    }


            }else{
                
						echo '<script>

                        Swal.fire({
        
                            type: "error",
                            title:"¡La Categoria no puede estar vacia o tener caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
        
                        }).then((result)=>{
        
                            if(result.value){
        
                                window.location="categoria";
        
                            }
        
                        });        
        
                        </script>';
            }

        }

    }

    /*=======================
borrar categoria
======================*/

static public function ctrBorrarCategoria(){

    if(isset($_GET["idCategoria"])){

        $tabla = "categorias";
        $datos = $_GET["idCategoria"];

        $respuesta = ModeloCategorias :: mdlBorrarCategoria($tabla, $datos);

        if($respuesta == "ok"){


            echo '<script>

			Swal.fire({

				type: "success",
				title:"¡Categoria eliminada correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false

			}).then((result)=>{

				if(result.value){

					window.location="categoria";

				}

			});


			</script>';
        }

    }

}

}