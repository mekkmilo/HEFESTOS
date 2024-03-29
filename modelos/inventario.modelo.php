<?php

require_once "conexion.php";

class ModeloInventario{

    /*==============================
    mostrar productos
    ===========================*/

    static public function mdlMostrarInventario($tabla, $item, $valor){

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

    /*===================
    registrar productos
    ====================*/

    static public function mdlIngresarProducto($tabla, $datos){

        $stmt = Conexion :: conectar() -> prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion, imagen, nombre, precio)VALUES(:id_categoria, :codigo, :descripcion, :imagen, :nombre, :precio)");

        $stmt-> bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT); 
        $stmt-> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt-> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
        $stmt-> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR );
        $stmt-> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR );
        $stmt-> bindParam(":precio", $datos["precio"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";
        }else{

            return "error";
        }

        $stmt->close();
        $stmt=null;

    }

    /*===================
    editar productos
    ====================*/

    static public function mdlEditarProducto($tabla, $datos){

        $stmt = Conexion :: conectar() -> prepare("UPDATE $tabla SET id_categoria = :id_categoria, descripcion = :descripcion, imagen = :imagen, nombre = :nombre, precio = :precio WHERE codigo = :codigo ");

        $stmt-> bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT); 
        $stmt-> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt-> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 
        $stmt-> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR );
        $stmt-> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR );
        $stmt-> bindParam(":precio", $datos["precio"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";
        }else{

            return "error";
        }

        $stmt->close();
        $stmt=null;

    }

    /*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}