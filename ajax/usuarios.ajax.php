<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";


class AjaxUsuarios{//clase

/*================================
editar usuario 
================================*/

public $idUsuario;

 public function ajaxEditarUsuario(){

    $item ="id";
    $valor = $this -> idUsuario;

    $respuesta = ControladorUsuarios :: ctrMostrarUsuarios($item, $valor);

    echo json_encode($respuesta);

    }

/*================================
Activar usuario
================================*/

public $activarUsuario;
public $activarId;

public function ajaxActivarUsuario(){

        $tabla = "empleados";

        $item1 = "estado";

        $valor1 = $this -> activarUsuario;

        $item2 = "id";

        $valor2 =  $this -> activarId;

        $respuesta = ModeloUsuarios :: mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

    }
/*================================
validar usuario no repetido
================================*/

public $validarUsuario;

public function ajaxValidarUsuario(){

    $item ="usuario";
    $valor = $this -> validarUsuario;

    $respuesta = ControladorUsuarios :: ctrMostrarUsuarios($item, $valor);

    echo json_encode($respuesta);


    }

}

/*================================
editar usuario objeto
================================*/

if(isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();
    
}

/*================================
Activar usuario objeto
================================*/

if(isset($_POST["activarUsuario"])){

    $activarUsuario = new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> ajaxActivarUsuario();

}

/*================================
validar usuario no repetido objeto
================================*/

if(isset($_POST["validarUsuario"])){

    $valUsuario = new AjaxUsuarios();
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];
    $valUsuario -> ajaxValidarUsuario();

}