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
/*=======================
    editar producto
    =======================*/

    public $idProducto;

  public function ajaxEditarProducto(){

    $item = "id";
    $valor = $this->idProducto;

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


    /*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();
}  



