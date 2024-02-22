<?php

require_once '../Model/Juego.php';
require_once 'Connection.php';

class JuegoController {
    
    
    /*public static function insertarJuego (Juego $j){
        try {
            $conex = new Conexion();
            $conex->query("INSERT INTO juegos values('$j->Codigo', '$j->Nombre_juego', '$j->Nombre_consola', $j->Anno, $j->Precio, '$j->Alquilado', '$j->Imagen', '$j->descripcion')"); 
            $filasAfectadas = $conex->affected_rows; 
            $conex->close(); 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $filasAfectadas = false; 
        }
        return $filasAfectadas; 
    }*/
    
    public static function insertarJuego (Juego $j){
        try {
            $conex = new Conexion();
            $reg = $conex->exec("INSERT INTO juegos values('$j->Codigo', '$j->Nombre_juego', '$j->Nombre_consola', $j->Anno, $j->Precio, '$j->Alguilado', '$j->Imagen', '$j->descripcion')"); 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $reg = false; 
        }
        return $reg; 
    }
    
    /*public static function modificarJuego (Juego $j){
        try {
            $conex = new Conexion();
            $conex->query("UPDATE juegos SET Nombre_juego = '$j->Nombre_juego', Nombre_consola = '$j->Nombre_consola', Anno = $j->Anno, Precio = $j->Precio, Alquilado = '$j->Alquilado', Imagen = '$j->Imagen', descripcion = '$j->descripcion' WHERE Codigo = '$j->Codigo'");

            $filasAfectadas = $conex->affected_rows; 
            $conex->close(); 
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $filasAfectadas = false; 
        }
        return $filasAfectadas; 
    }*/
    
    public static function modificarJuego (Juego $j){
        try {
            $conex = new Conexion();
            $reg = $conex->exec("UPDATE juegos SET Nombre_juego = '$j->Nombre_juego', Nombre_consola = '$j->Nombre_consola', Anno = $j->Anno, Precio = $j->Precio, Alguilado = '$j->Alquilado', Imagen = '$j->Imagen', descripcion = '$j->descripcion' WHERE Codigo = '$j->Codigo'");  
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $reg = false; 
        }
        return $reg; 
    }
    
    
    /*public static function mostrarJuegos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos"); 
            
            if ($result->num_rows()){
                while ($reg = $result->fetch_object()){
                    $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion); 
                    $juegos[] = $j; 
                }                
            }
            else $juegos = 0; 
            $conex->close(); 
        } catch (Exception $ex) {
            $juegos = false; 
            echo $ex->getMessage();
        } 
        return $juegos; 
    }*/
    
    public static function mostrarJuegos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos"); 
            
            if ($result->rowCount()){
                while ($reg = $result->fetchObject()){
                    $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alguilado, $reg->Imagen, $reg->descripcion); 
                    $juegos[] = $j; 
                }                
            }
            else $juegos = 0;  
        } catch (Exception $ex) {
            $juegos = false; 
            echo $ex->getMessage();
        } 
        return $juegos; 
    }
    
    
    /*public static function mostrarJuegosAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Alquilado = 'SI'"); 
            
            if ($result->num_rows){
                while ($reg = $result->fetch_object()){
                    $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion); 
                    $juegos[] = $j; 
                }                
            }
            else $juegos = 0; 
            $conex->close(); 
        } catch (Exception $ex) {
            $juegos = false; 
            echo $ex->getMessage();
        } 
        return $juegos; 
    }*/
    
    public static function mostrarJuegosAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Alguilado = 'SI'"); 
            
            if ($result->rowCount()){
                while ($reg = $result->fetchObject()){
                    $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alguilado, $reg->Imagen, $reg->descripcion); 
                    $juegos[] = $j; 
                }                
            }
            else $juegos = 0;  
        } catch (Exception $ex) {
            $juegos = false; 
            echo $ex->getMessage();
        } 
        return $juegos; 
    }
    
    
    /*public static function mostrarJuegosNoAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Alquilado = 'NO'"); 
            
            if ($result->num_rows){
                while ($reg = $result->fetch_object()){
                    $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion); 
                    $juegos[] = $j; 
                }                
            }
            else $juegos = 0; 
            $conex->close(); 
        } catch (Exception $ex) {
            $juegos = false; 
            echo $ex->getMessage();
        } 
        return $juegos; 
    }*/
    
    public static function mostrarJuegosNoAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Alguilado = 'NO'"); 
            
            if ($result->rowCount()){
                while ($reg = $result->fetchObject()){
                    $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alguilado, $reg->Imagen, $reg->descripcion); 
                    $juegos[] = $j; 
                }                
            }
            else $juegos = 0;  
        } catch (Exception $ex) {
            $juegos = false; 
            echo $ex->getMessage();
        } 
        return $juegos; 
    }
    
    
    /*public static function borrarJuego($cod) {
        try {
            $conex = new Conexion();
            $conex->query("DELETE FROM juegos WHERE Codigo = '$cod'");
            $filasAfectadas = $conex->affected_rows;
            $conex->close();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $filasAfectadas = false;
        }
        return $filasAfectadas;
    }*/
    
    public static function borrarJuego($cod) {
        try {
            $conex = new Conexion();
            $reg = $conex->exec("DELETE FROM juegos WHERE Codigo = '$cod'");
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $reg = false;
        }
        return $reg;
    }
    
    
    /*public static function buscarJuego($cod) {

        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Codigo = '$cod'");

            if ($result->num_rows) {
                $reg = $result->fetch_object();
                $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alquilado, $reg->Imagen, $reg->descripcion); 
            } else {
                $j = false;
            }
        } catch (Exception $ex) {
            $j = false;
            echo $ex->getMessage();
        }
        return $j;
    }*/
    
    public static function buscarJuego($cod) {

        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Codigo = '$cod'");

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $j = new Juego($reg->Codigo, $reg->Nombre_juego, $reg->Nombre_consola, $reg->Anno, $reg->Precio, $reg->Alguilado, $reg->Imagen, $reg->descripcion); 
            } else {
                $j = false;
            }
        } catch (Exception $ex) {
            $j = false;
            echo $ex->getMessage();
        }
        return $j;
    }
    
    
}

