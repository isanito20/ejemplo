<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <script>
            function confirmarBorrado() {
                return confirm("¿Estás seguro de que deseas borrar este juego?");
            }
        </script>
        
    </head>
    <body>
        <?php
            require_once '../Controller/ClienteController.php';
            require_once '../Controller/JuegoController.php';
            session_start();
            if(isset($_SESSION['usuario'])){
                $c = $_SESSION['usuario'];
            }
            
            if (isset($_POST['cerrar'])) {
                header("Location: CerrarSesion.php");
                exit();
            }
            
            if (isset($_POST['login'])) {
                header("Location: Login.php");
                exit();
            }
            
            if (isset($_POST['registro'])) {
                header("Location: Registro.php");
                exit();
            }
            
            if (isset($_POST['nuevo'])) {
                header("Location: InsertarJuego.php");
                exit();
            }
            
            if (isset($_POST['modificar'])) {
                $_SESSION['juego'] = $_POST['cod'];
                header("Location: ModificarJuego.php");
                exit();
            }
            
            if(isset($_POST['gestionar'])){
                header("Location: GestionarJuegos.php");
                exit();
            }
            
        ?>
        
            <form action="" method="POST">
                <h2>Bienvenido <?php if(isset($c)) echo $c->Nombre ?> <?php if(isset($c)) echo $c->Apellidos ?></h2>
                <input type="submit" name="todos" value="Todos los juegos">
                <input type="submit" name="alquilados" value="Juegos alquilados">
                <input type="submit" name="noAlquilados" value="Juegos no alquilados">
                <?php
                    if(isset($c)){
                        echo "<input type='submit' name='gestionar' value='Gestionar mis juegos'>";
                        if($c->Tipo == "admin"){
                            echo "<input type='submit' name='nuevo' value='Nuevo juego'>";
                        }
                    }
                ?>
                <input type="submit" name="login" value="Ir a login">
                <input type="submit" name="registro" value="Ir a registro">
                <?php
                    if(isset($c)){
                        echo "<input type='submit' name='cerrar' value='Cerrar sesión'>";
                    }
                ?>
            </form>

        <?php
        
            if(isset($_POST['todos'])){
                $juegos = JuegoController::mostrarJuegos(); 
                if($juegos === false) echo '<span style=color:red>ERROR EN LA BASE DE DATOS</span>';
                else{
                    if ($juegos){
                        foreach ($juegos as $j){
                        echo "<form action='' method='POST'>";
                        echo $j; 
                        if(isset($c) && $c->Tipo == "admin"){
                            echo "<input type='hidden' name='cod' value='{$j->Codigo}'>";
                            echo "<input type='submit' name='modificar' value='Modificar'>";
                            echo "<input type='submit' name='borrar' value='Borrar' onclick='return confirmarBorrado()'>";
                        }
                        echo "<br><hr><br></form>";
                        }
                    }
                    else echo "NO EXISTE"; 
                }
            }
            
            if(isset($_POST['alquilados'])){
                $juegos = JuegoController::mostrarJuegosAlquilados(); 
                if($juegos === false) echo '<span style=color:red>ERROR EN LA BASE DE DATOS</span>';
                else{
                    if ($juegos){
                        foreach ($juegos as $j){
                        echo "<form action='' method='POST'>";
                        echo $j; 
                        if(isset($c) && $c->Tipo == "admin"){
                            echo "<input type='hidden' name='cod' value='{$j->Codigo}'>";
                            echo "<input type='submit' name='modificar' value='Modificar'>";
                            echo "<input type='submit' name='borrar' value='Borrar' onclick='return confirmarBorrado()'>";
                        }
                        echo "<br><hr><br></form>";
                        }
                    }
                    else echo "NO EXISTE"; 
                }
            }
            
            if(isset($_POST['noAlquilados'])){
                $juegos = JuegoController::mostrarJuegosNoAlquilados(); 
                if($juegos === false) echo '<span style=color:red>ERROR EN LA BASE DE DATOS</span>';
                else{
                    if ($juegos){
                        foreach ($juegos as $j){
                        echo "<form action='' method='POST'>";
                        echo $j; 
                        if(isset($c) && $c->Tipo == "admin"){
                            echo "<input type='hidden' name='cod' value='{$j->Codigo}'>";
                            echo "<input type='submit' name='modificar' value='Modificar'>";
                            echo "<input type='submit' name='borrar' value='Borrar' onclick='return confirmarBorrado()'>";
                        }
                        echo "<br><hr><br></form>";
                        }
                    }
                    else echo "NO EXISTE"; 
                }
            }
            
            
            if (isset($_POST['borrar'])) {
                $filasAfectadas = JuegoController::borrarJuego($_POST['cod']);

                if ($filasAfectadas === false) {
                    echo '<span style=color:red>ERROR EN LA BASE DE DATOS</span>';
                } else {
                    if ($filasAfectadas) {
                        echo "El juego ha sido borrado exitosamente.";
                    } else {
                        echo 'NO EXISTE';
                    }
                }
            }

        ?>
        
    </body>
</html>
