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
            $juegos = AlquilarController::buscarAlquiler($c->DNI); 
            
            if(isset($_POST['devolver'])){
                $jmod = JuegoController::buscarJuego($_POST['cod']);
                try{
                    $juego = new Juego($_POST['cod'], $jmod->Nombre_juego, $jmod->Nombre_consola, $jmod->Anno, $jmod->Precio, 'NO', $jmod->Imagen, $jmod->descripcion);
                    $resultado = JuegoController::modificarJuego($juego);
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                
                try{
                    $alquiler = new Alquilar($_POST['cod'], $c->DNI, $_POST['fecha'], date('Y-m-d'));
                    $resultado = AlquilarController::modificarAlquiler($alquiler);
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                echo "Juego devuelto correctamente";
            }
            
            if($juegos === false) echo 'No tienes ningún juego alquilado<hr>';
            else{
                if ($juegos){
        ?>
                    <table border="1">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre del juego</th>
                        <th>Nombre de la consola</th>
                        <th>Año</th>
                        <th>Fecha alquiler</th>
                        <th>Fecha devol. prevista</th>
                        <th>Fecha devolución</th>
                        <th>Acciones</th>
                    </tr>

                    <?php foreach ($juegos as $j) { 
                        $jmod = JuegoController::buscarJuego($j->Cod_juego); ?>
                        <form action="" method="POST">
                            <input type="hidden" name="cod" value="<?= $j->Cod_juego ?>">
                            <input type="hidden" name="fecha" value="<?= $j->Fecha_alquiler ?>">
                            <tr>
                                <td><img src="<?= $jmod->Imagen ?>" width="100" height="170"></td>
                                <td><?= $jmod->Nombre_juego ?></td>
                                <td><?= $jmod->Nombre_consola ?></td>
                                <td><?= $jmod->Anno ?></td>
                                <td><?= $j->Fecha_alquiler ?></td>
                                <td><?= date('Y-m-d', strtotime($j->Fecha_alquiler . ' +1 week')) ?></td>
                                <td><?php if($j->Fecha_devol != '0000-00-00') echo $j->Fecha_devol?></td>
                                <td><?php if($j->Fecha_devol == '0000-00-00') echo "<input type='submit' name='devolver' value='Devolver'>" ?></td>
                            </tr>
                        </form>
                    <?php } ?>
                </table>
            <?php
                }
                else echo "NO EXISTE"; 
            }
        ?>
        <a href="Index.php"><button type="button">Volver</button></a>
    </body>
</html>
