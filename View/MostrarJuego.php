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
            require_once '../Controller/JuegoController.php';
            session_start();
            $jcod = JuegoController::buscarJuego($_GET['codigo']);
            
            $disabled = "";
            if($jcod->Alguilado == 'SI' || !isset($_SESSION['usuario'])){
                $disabled = "disabled";
            }
            
            if(isset($_POST['alquilar'])){
                $_SESSION['juego'] = $jcod->Codigo;
                header("Location: AlquilarJuego.php");
                exit();
            }
        ?>
        <form action="" method="POST">
            Nombre del juego: <?= $jcod->Nombre_juego ?><br>
            Nombre de la consola: <?= $jcod->Nombre_consola ?><br>
            Año: <?= $jcod->Anno ?><br>
            Precio: <?= $jcod->Precio ?><br>
            Alquilado: <?= $jcod->Alquilado ?><br>
            Descripción: <?= $jcod->descripcion ?><br>
            <img src="<?= $_GET['ruta'] ?>" witdt=400 height=500><br><br>
            <a href="Index.php"><button type="button">Volver</button></a>
            <input type="submit" name="alquilar" value="Alquilar" <?= $disabled ?>>
        </form>
    </body>
</html>
