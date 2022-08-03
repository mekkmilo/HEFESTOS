<?php

require_once "../controladores/pedido.controlador.php";
require_once "../modelos/pedido.modelo.php";


class AjaxPedidos{//clase


    public $idPedido;

 public function ajaxEditarPedido(){

    $item ="estado";
    $valor = $this -> idPedido;

    $respuesta = ControladorPedidos :: ctrMostrarPedido($item, $valor);

    echo json_encode($respuesta);

    }


/*================================
Activar pedido
================================*/

public $activarId;
public $activarPedido;

public function ajaxActivarPedido(){

        $tabla = "pedidos";

        $item1 = "estado";

        $valor1 = $this -> activarPedido;

        $item2 = "id";

        $valor2 =  $this -> activarId;

        $respuesta = ModeloPedido :: mdlActualizarPedido($tabla, $item1, $valor1, $item2, $valor2);

    }
}

/*================================
editar pedido objeto
================================*/

if(isset($_POST["idPedido"])){

    $editar = new AjaxPedidos();
    $editar -> idPedido = $_POST["idPedido"];
    $editar -> ajaxEditarPedido();
    
}

/*================================
Activar Pedido objeto
================================*/

if(isset($_POST["activarPedido"])){

    $activarPedido = new AjaxPedidos();
    $activarPedido -> activarPedido = $_POST["activarPedido"];
    $activarPedido -> activarId = $_POST["activarId"];
    $activarPedido -> ajaxActivarPedido();
}