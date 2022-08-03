<?php 

class ControladorPedidos{


//mostrar pedidos

    static public function ctrMostrarPedido($item, $valor){


        $tabla= "pedidos";

        $respuesta = ModeloPedido::mdlMostrarPedido($tabla, $item, $valor);

        return $respuesta;

    }

// crear pedido


static public function ctrCrearPedido(){

    if(isset($_POST["nuevoCliente"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) && 
        preg_match('/^[a-zA-Z0-9ñÑáéíóÁÉÍÓÚ@. ]+$/', $_POST["nuevoEmail"]) && 
        preg_match('/^[0-9 ]+$/', $_POST["nuevoTelefono"])){

            $tabla = "pedidos";

            $datos = array("nombre" =>$_POST["nuevoCliente"],
					       "correo" =>$_POST["nuevoEmail"],
						   "telefono" =>$_POST["nuevoTelefono"],
						   "pedido" =>$_POST["nuevoPedido"]);

             $respuesta = ModeloPedido :: mdlIngresarPedido($tabla, $datos);

             if($respuesta == "ok"){

                echo '<script>

                Swal.fire({

                    type: "success",
                    title:"¡El pedido se ha realizado, pronto nos contactaremos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                    }).then((result)=>{

                        if(result.value){

                        window.location="listaInventario";

                        }

                            });


                </script>';


                           }
							


        }else{

            echo '<script>

                        Swal.fire({        
                            type: "error",
                            title:"¡El pedido no puede ir vacio ni llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false        
                        }).then((result)=>{        
                            if(result.value){        
                                window.location="listaInventario";        
                            }        
                        });       
        
                        </script>';


            }

        }
    }

/*================================
borrar pedido
 ================================*/

 static public function ctrBorrarpedido(){

    if(isset($_GET["idPedido"])){

        $tabla = "pedidos";
        $datos = $_GET["idPedido"];

       $respuesta = ModeloPedido :: mdlBorrarPedido($tabla, $datos);

       if($respuesta == "ok"){


        echo '<script>

        Swal.fire({

            type: "success",
            title:"¡Pedido Eliminado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false

        }).then((result)=>{

            if(result.value){

                window.location="serviceP";

            }

        });


        </script>';
    }

        }
 
    }
}   
