<?php

require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

//mostrar tabla
    static public function mostratTablaProductos(){

        $item = null;
        $valor= null;

        $inventario=ControladorInventario::ctrMostrarInventario($item, $valor);
        
        
       

        $datosJson = '{
            "data": [';

            for($i = 0; $i < count($inventario); $i++){

                $imagen = "<img src='".$inventario[$i]["imagen"]."' width='40px'>";

                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$inventario[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto'idProducto='".$inventario[$i]["id"]."' codigo='".$inventario[$i]["codigo"]."' imagen='".$inventario[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

                $item="id";
                $valor= $inventario[$i]["id_categoria"];

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);


                $datosJson .='[
                    "'.($i+1).'",
                    "'.$imagen.'",
                    "'.$inventario[$i]["codigo"].'",
                    "'.$inventario[$i]["nombre"].'",
                    "'.$inventario[$i]["descripcion"].'",
                    "'.$categorias["categoria"].'",                    
                    "'.$inventario[$i]["precio"].'",
                    "'.$inventario[$i]["fecha"].'",
                    "'.$botones.'"
                ],';

            }

            $datosJson = substr($datosJson, 0, -1);
               
            $datosJson .= '] 
        }';

        echo $datosJson;

        

        
    }

  

}

// activar tabla productos

$activarProductos = new TablaProductos();
$activarProductos -> mostratTablaProductos();

    