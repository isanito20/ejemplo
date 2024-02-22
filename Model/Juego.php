<?php

class Juego {
    
    private $Codigo;
    private $Nombre_juego;
    private $Nombre_consola;
    private $Anno;
    private $Precio;
    private $Alguilado;
    private $Imagen;
    private $descripcion;
    
    public function __construct($Codigo, $Nombre_juego, $Nombre_consola, $Anno, $Precio, $Alguilado, $Imagen, $descripcion) {
        $this->Codigo = $Codigo;
        $this->Nombre_juego = $Nombre_juego;
        $this->Nombre_consola = $Nombre_consola;
        $this->Anno = $Anno;
        $this->Precio = $Precio;
        $this->Alquilado = $Alguilado;
        $this->Imagen = $Imagen;
        $this->descripcion = $descripcion;
    }
    
    public function modJuego($Codigo, $Nombre_juego, $Nombre_consola, $Anno, $Precio, $Alguilado, $Imagen, $descripcion) {
        $this->Codigo = $Codigo;
        $this->Nombre_juego = $Nombre_juego;
        $this->Nombre_consola = $Nombre_consola;
        $this->Anno = $Anno;
        $this->Precio = $Precio;
        $this->Alquilado = $Alguilado;
        $this->Imagen = $Imagen;
        $this->descripcion = $descripcion;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __toString() {
        
        if ($this->Alguilado == 'SI') {
            $opacity = '0.3';
        } else {
            $opacity = '1.0';
        }
    
        return "<hr>-Nombre: ".$this->Nombre_juego."<br>"
             . "<a href='MostrarJuego.php?ruta=$this->Imagen&codigo=$this->Codigo'><img src='$this->Imagen' width=200 height=260 style = 'opacity: $opacity;'></a>";
    }
}
