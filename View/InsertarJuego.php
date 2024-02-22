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
            if(isset($_POST['insertar'])){
                if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                    $fich = time()."-".$_FILES['imagen']['name'];
                    $ruta = "fotos/".$fich;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                    $codigo = $_POST['nombre'];
                    try{
                        $j = new Juego($codigo, $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], "NO", $ruta, $_POST['descripcion']);
                        $resultado = JuegoController::insertarJuego($j);
                        if ($resultado === false) {
                            echo " || Error al insertar el registro";
                        } else {
                            echo "Juego insertado correctamente";
                        }
                    } catch (Exception $ex) {
                        die($ex->getMessage());
                    }  
                }else{
                    echo "Error al subir el fichero";
                }
            }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Insertar nuevo juego</h1>
            Nombre:<input type="text" name="nombre" required><br>
            Consola: 
            <select name="consola" required>
                <option value="PS4">PS4</option>
                <option value="PS5">PS5</option>
                <option value="XBOX">XBOX</option>
                <option value="NINTENDO">NINTENDO</option>
                <option value="PC">PC</option>
            </select><br>
            Año:<input type="number" name="anio" required><br>
            Precio:<input type="number" name="precio" required><br>
            Imagen:<input type="file" name="imagen" required><br>
            Descripcion:<textarea name="descripcion"></textarea><br><br>
            <input type="submit" name="insertar" value="Insertar juego">
            <a href="Index.php"><button type="button">Volver</button></a>
        </form>
    </body>
</html>
