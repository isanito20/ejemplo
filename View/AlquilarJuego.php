<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../Controller/AlquilarController.php';
            require_once '../Controller/JuegoController.php';
            require_once '../Model/Cliente.php';
            session_start();
            $c = $_SESSION['usuario'];
            $jcod = $_SESSION['juego'];
            $jmod = JuegoController::buscarJuego($jcod);
            
            try{
                $a = new Alquilar($jcod, $c->DNI, date('Y-m-d'), NULL);
                $resultado = AlquilarController::insertarAlquiler($a);
                if ($resultado === false) {
                    echo " || Error al insertar el registro";
                } else {
                    echo "Alquiler insertado correctamente";
                }
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            
            try{
                $j = new Juego($jcod, $jmod->Nombre_juego, $jmod->Nombre_consola, $jmod->Anno, $jmod->Precio, 'SI', $jmod->Imagen, $jmod->descripcion);
                $resultado = JuegoController::modificarJuego($j);
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            
            $fechaMasUnaSemana = strtotime(date('Y-m-d')) + (7 * 24 * 60 * 60);
            $fechaMasUnaSemanaFormateada = date('Y-m-d', $fechaMasUnaSemana);
        ?>
        
        <form action="" method="POST">
            <hr><h3>Fecha de devolución sin recargo <?= $fechaMasUnaSemanaFormateada ?></h3>
            <a href="Index.php"><button type="button">Volver</button></a>
        </form>
    </body>
</html>
