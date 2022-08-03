<?php

require_once "controladores/plantilla.controladores.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/inventario.controlador.php";
require_once "controladores/pedido.controlador.php";


 require_once "modelos/usuarios.modelo.php";
 require_once "modelos/categorias.modelo.php";
 require_once "modelos/inventario.modelo.php";
 require_once "modelos/pedido.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();/*metodo de controlador*/

