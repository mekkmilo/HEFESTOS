<?php

class Conexion{//clase

    public static function conectar (){
            //clase        conexion servidor, usuario, contraseña
        $link = new PDO("mysql:host=localhost;dbname=hefestos",
        "root",
        "");//objeto conexcion 

        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $link ->exec("set names utf8");// uso caracter latinos

        

        return $link;

    }
}