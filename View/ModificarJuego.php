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
        <h1>Modificar juego</h1>
        <?php
            session_start();
            require_once '../Controller/JuegoController.php';
            $jcod = $_SESSION['juego'];
            $jmod = JuegoController::buscarJuego($jcod);
            if(isset($_POST["modificar"])){
                if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                    $fich = time()."-".$_FILES['imagen']['name'];
                    $ruta = "fotos".$fich;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                    try{
                        $j = new Juego($jcod, $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], $_POST['alquilado'], $ruta, $_POST['descripcion']);
                        $resultado = JuegoController::modificarJuego($j);
                        if ($resultado === false) {
                            echo " || Error al modificar el registro";
                        } else {
                            echo "<hr>Juego modificado correctamente<hr>";
                        }
                    } catch (Exception $ex) {
                        die($ex->getMessage());
                    }  
                }else{
                    try{
                        $j = new Juego($jcod, $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], $_POST['alquilado'], $jmod->Imagen, $_POST['descripcion']);
                        $resultado = JuegoController::modificarJuego($j);
                        if ($resultado === false) {
                            echo " || Error al modificar el registro";
                        } else {
                            echo "<hr>Juego modificado correctamente<hr>";
                        }
                    } catch (Exception $ex) {
                        die($ex->getMessage());
                    }
                }
            }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            Nombre del juego:<input type="text" name="nombre" value="<?= $jmod->Nombre_juego ?>"><br>
            Nombre de la consola:<select name="consola">
            <?php
                $consolas = array("PS4", "PS5", "NINTENDO", "XBOX", "PC");
                foreach ($consolas as $consola) {
                    $selected = '';
                    if ($jmod->Nombre_consola == $consola) {
                        $selected = 'selected';
                    }
                    echo "<option value='$consola' $selected>$consola</option>";
                }
            ?>
            </select><br>
            Año:<input type="number" name="anio" value="<?= $jmod->Anno ?>"><br>
            Precio:<input type="number" name="precio" value="<?= $jmod->Precio ?>"><br>
            Alquilado:<select name="alquilado">
            <?php
                $alquilado = array("SI", "NO");
                foreach ($alquilado as $opcion) {
                    $selected = '';
                    if ($jmod->Alquilado == $opcion) {
                        $selected = 'selected';
                    }
                    echo "<option value='$opcion' $selected>$opcion</option>";
                }
            ?>
            </select><br>
            Imagen:<input type="file" name="imagen">
            <img src="<?= $jmod->Imagen ?>" width=200 height=270><br>
            Descripción:<input type="text" name="descripcion" value="<?= $jmod->descripcion ?>"><br><br>
            <input type="submit" name="modificar" value="Modificar">
            <a href="Index.php"><button type="button">Volver</button></a>
        </form>
    </body>
</html>
