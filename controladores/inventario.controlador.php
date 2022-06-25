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
   

}