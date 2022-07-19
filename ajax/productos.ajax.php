<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

    /*=======================
    generar codigo categoria
    =======================*/

    public $idCategoria;

        public function ajaxCrearCodigoProducto(){

            $item = "id_categoria";
            $valor = $this -> idCategoria;    

            $respuesta = ControladorInventario::ctrMostrarInventario($item, $valor);

            echo json_encode($respuesta);

        }
}


/*=======================
    generar codigo categoria desde ID_CATEGORIA
    =======================*/

    if (isset($_POST["idCategoria"])){

        $codigoProducto = new AjaxProductos();
        $codigoProducto -> idCategoria = $_POST["idCategoria"];
        $codigoProducto -> ajaxCrearCodigoProducto();
        
    }



