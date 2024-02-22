<?php
require_once '../Model/Alquilar.php';
require_once 'Connection.php';

class AlquilarController {
    
    /*public static function insertarAlquiler (Alquilar $a){
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO alquiler(Cod_juego, DNI_cliente, Fecha_alquiler, Fecha_devol) VALUES ('$a->Cod_juego','$a->DNI_cliente','$a->Fecha_alquiler','$a->Fecha_devol')"); 
            $filasAfectadas = $conex->affected_rows; 
            $conex->close(); 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $filasAfectadas = false; 
        }
        return $filasAfectadas; 
    }*/
    
    public static function insertarAlquiler (Alquilar $a){
        try {
            $conex = new Conexion();
            $reg = $conex->exec("INSERT INTO alquiler(Cod_juego, DNI_cliente, Fecha_alquiler, Fecha_devol) VALUES ('$a->Cod_juego','$a->DNI_cliente','$a->Fecha_alquiler','$a->Fecha_devol')");   
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $reg = false; 
        }
        return $reg; 
    }
    
    
   /* public static function buscarAlquiler($cod) {

        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM alquiler WHERE DNI_cliente = '$cod'");

            if ($result->num_rows) {
                while ($reg = $result->fetch_object()) {
                    $alquileres[] = new Alquilar($reg->Cod_juego, $reg->DNI_cliente, $reg->Fecha_alquiler, $reg->Fecha_devol);
                }
            } else {
                $alquileres = false;
            }
        } catch (Exception $ex) {
            $alquileres = false;
            echo $ex->getMessage();
        }
        return $alquileres;
    }*/
    
    public static function buscarAlquiler($cod) {

        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM alquiler WHERE DNI_cliente = '$cod'");

            if ($result->rowCount()) {
                while ($reg = $result->fetchObject()) {
                    $alquileres[] = new Alquilar($reg->Cod_juego, $reg->DNI_cliente, $reg->Fecha_alquiler, $reg->Fecha_devol);
                }
            } else {
                $alquileres = false;
            }
        } catch (Exception $ex) {
            $alquileres = false;
            echo $ex->getMessage();
        }
        return $alquileres;
    }
    
    
    /*public static function modificarAlquiler (Alquilar $a){
        try {
            $conex = new Conexion();
            $conex->query("UPDATE alquiler SET Cod_juego = '$a->Cod_juego', DNI_cliente = '$a->DNI_cliente', Fecha_alquiler = '$a->Fecha_alquiler', Fecha_devol = '$a->Fecha_devol' WHERE Cod_juego = '$a->Cod_juego' AND DNI_cliente = '$a->DNI_cliente' AND Fecha_alquiler = '$a->Fecha_alquiler'");

            $filasAfectadas = $conex->affected_rows; 
            $conex->close(); 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $filasAfectadas = false; 
        }
        return $filasAfectadas; 
    }*/
    
    public static function modificarAlquiler (Alquilar $a){
        try {
            $conex = new Conexion();
            $reg = $conex->exec("UPDATE alquiler SET Cod_juego = '$a->Cod_juego', DNI_cliente = '$a->DNI_cliente', Fecha_alquiler = '$a->Fecha_alquiler', Fecha_devol = '$a->Fecha_devol' WHERE Cod_juego = '$a->Cod_juego' AND DNI_cliente = '$a->DNI_cliente' AND Fecha_alquiler = '$a->Fecha_alquiler'");
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $reg = false; 
        }
        return $reg; 
    }
    
}
