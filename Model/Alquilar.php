<?php

class Alquilar {
    public $Cod_juego;
    public $DNI_cliente;
    public $Fecha_alquiler;
    public $Fecha_devol;
    
    
    public function __construct($Cod_juego, $DNI_cliente, $Fecha_alquiler, $Fecha_devol) {
        $this->Cod_juego = $Cod_juego;
        $this->DNI_cliente = $DNI_cliente;
        $this->Fecha_alquiler = $Fecha_alquiler;
        $this->Fecha_devol = $Fecha_devol;
    }
    

    public function getCod_juego() {
        return $this->Cod_juego;
    }

    public function getDNI_cliente() {
        return $this->DNI_cliente;
    }

    public function getFecha_alquiler() {
        return $this->Fecha_alquiler;
    }

    public function getFecha_devol() {
        return $this->Fecha_devol;
    }

    public function setCod_juego($Cod_juego): void {
        $this->Cod_juego = $Cod_juego;
    }

    public function setDNI_cliente($DNI_cliente): void {
        $this->DNI_cliente = $DNI_cliente;
    }

    public function setFecha_alquiler($Fecha_alquiler): void {
        $this->Fecha_alquiler = $Fecha_alquiler;
    }

    public function setFecha_devol($Fecha_devol): void {
        $this->Fecha_devol = $Fecha_devol;
    }

}
