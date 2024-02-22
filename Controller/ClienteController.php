<?php

require_once '../Model/Cliente.php';
require_once 'Connection.php';


class ClienteController {
    
    /*public static function buscarCliente($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cliente WHERE DNI = '$dni'");

            if ($result->num_rows) {
                $reg = $result->fetch_object();
                $c = new Cliente($reg->DNI, $reg->Nombre, $reg->Apellidos, $reg->Direccion, $reg->Localidad, $reg->Clave, $reg->Tipo);
            } else {
                $c = false;
            }
        } catch (Exception $ex) {
            $c = false;
            echo $ex->getMessage();
        }
        return $c;
    }*/
    
    public static function buscarCliente($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cliente WHERE DNI = '$dni'");

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $c = new Cliente($reg->DNI, $reg->Nombre, $reg->Apellidos, $reg->Direccion, $reg->Localidad, $reg->Clave, $reg->Tipo);
            } else {
                $c = false;
            }
        } catch (Exception $ex) {
            $c = false;
            echo $ex->getMessage();
        }
        return $c;
    }
    
    
    /*public static function insertarCliente(Cliente $c) {
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO cliente VALUES ('$c->DNI', '$c->Nombre', '$c->Apellidos', '$c->Direccion', '$c->Localidad', '$c->Clave', '$c->Tipo')");
            $reg = $conex->affected_rows;
            $conex->close();
        } catch (Exception $ex) {
            echo "Usuario ya existe";
            $reg = false;
        }
        return $reg;
    }*/
    
    public static function insertarCliente(Cliente $c) {
        try {
            $conex = new Conexion();
            $reg = $conex->exec("INSERT INTO cliente VALUES ('$c->DNI', '$c->Nombre', '$c->Apellidos', '$c->Direccion', '$c->Localidad', '$c->Clave', '$c->Tipo')");
        } catch (Exception $ex) {
            echo "Usuario ya existe";
            $reg = false;
        }
        return $reg;
    }
}
