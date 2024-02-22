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
            require_once '../Controller/ClienteController.php';
            session_start();

            if (!isset($_SESSION['contadores'])) {
                $_SESSION['contadores'] = array();
            }

            $error = "";

            if(isset($_POST['iniciar'])){
                $c = ClienteController::buscarCliente($_POST['usuario']);

                if ($c === false) {
                    $error = "Usuario no existe";
                } else {
                    if ($c) {
                        if(md5($_POST["pass"], $c->Clave)){
                            $_SESSION['usuario'] = $c;
                            header("location:Index.php");
                            exit();
                        } else {
                            if (!isset($_SESSION['contadores'][$_POST['usuario']])) {
                                $_SESSION['contadores'][$_POST['usuario']] = 3;
                            }
                            $_SESSION['contadores'][$_POST['usuario']]--;

                            if($_SESSION['contadores'][$_POST['usuario']] <= 0){
                                header("Location: Intentos.php");
                                exit();
                            }

                            $error = "Contraseña incorrecta {$c->Nombre} {$c->Apellidos}, te quedan {$_SESSION['contadores'][$_POST['usuario']]} intento/s";
                        }
                    }
                }
            }
            
            if(isset($_POST['atras'])){
                header("Location: Index.php");
            }
        ?>

        <form action="" method="POST">
            Usuario(DNI):<input type="text" name="usuario"><br>
            Clave:<input type="password" name="clave"><br><br>
            <input type="submit" name="atras" value="Volver" <?php if(!isset($_SESSION['usuario'])) echo 'disabled' ?>>
            <input type="submit" name="iniciar" value="Iniciar sesión">
            <a href="Registro.php"><button type="button">Registrarse</button></a><br><br>
            <?= $error ?>
        </form>
    </body>
</html>
