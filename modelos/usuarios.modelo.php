<?php

require_once "conexion.php";

class ModeloUsuarios{

    //mostrar usurarios

   public static function MdlMostrarUsuarios($tabla, $item, $valor){

        if($item != null){

                //objeto pdo                                                                 requisito estructura pdo
            $stmt = Conexion :: conectar()-> prepare("SELECT * FROM $tabla WHERE $item =:$item");
            //       enlasa parametro                   solo recibe strings
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();
            //              retorno de un solo item por fetch
            return $stmt -> fetch();

        }else{
                //objeto pdo         requisito estructura pdo
                $stmt = Conexion :: conectar()-> prepare("SELECT * FROM $tabla");
                    
                $stmt -> execute();
                //              retorno de un solo item por fetch
                return $stmt -> fetchAll();  
        }        

        $stmt -> close();

        $stmt =null;

    }

    //registro de usuario

    static public function mdlIngresarUsuario($tabla, $datos){

        $stmt = Conexion :: conectar()-> prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario,
         :password, :perfil, :foto)");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario",  $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt -> close();

        $stmt =null;

    }

}

