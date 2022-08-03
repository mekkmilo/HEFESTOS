<?php

require_once "conexion.php";

class ModeloPedido{

    /*==============================
    mostrar productos
    ===========================*/

    static public function mdlMostrarPedido($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);
            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla");
            $stmt -> execute();

            return $stmt -> fetchAll();


        }

        $stmt -> close ();
        $stmt = null;

    }

    //registro de pedidos

    static public function mdlIngresarPedido($tabla, $datos){

        $stmt = Conexion :: conectar()-> prepare("INSERT INTO $tabla(nombre, correo, telefono, pedido) VALUES (:nombre, :correo,
         :telefono, :pedido)");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":correo",  $datos["correo"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":pedido", $datos["pedido"], PDO::PARAM_STR);
        

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt -> close();

        $stmt =null;

    }

/*================================
Actualizar pedido
================================*/
static public function mdlActualizarPedido($tabla, $item1, $valor1, $item2, $valor2){


    $stmt = Conexion :: conectar()-> prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

    $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
    $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

    if ($stmt -> execute()){

        return "ok";

    }else{

        return "error";
        }

        $stmt -> close();

        $stmt = null;


    }

    /*=================================================
	borrar Pedido
	=================================================*/

    static public function mdlBorrarPedido($tabla, $datos){

        $stmt = Conexion :: conectar () -> prepare ("DELETE FROM $tabla WHERE id = :id");

        $stmt -> bindParam (":id", $datos, PDO :: PARAM_INT);

            if($stmt -> execute()){

                return "ok";
            }else{

                return "error";
            }

            $stmt -> close();
            $stmt = null;


    }

}