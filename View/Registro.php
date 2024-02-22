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
        $errorContraseña = false;
        $errorUsuario = false;
        
        if (isset($_POST['aceptar'])) {
            if($_POST['clave'] == $_POST['repclave']){
                try{
                    $pass = $_POST["pass"];
                    $hash_password = md5($pass);
                    $c = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['localidad'], $hash_password, $_POST['tipo']);
                    $resultado = ClienteController::insertarCliente($c);

                    if ($resultado === false) {
                        echo " || Error al insertar el registro";
                    } else {
                        echo "Se han insertado $resultado registros ";
                        header("location:Login.php");
                    }
                } catch (Exception $ex) {
                    $errorUsuario = true;
                }  
            }else{
                $errorContraseña = true;
            }
        }
        
        ?>
        
        <form action="" method="POST">
            <h2>Registrarse</h2>
            DNI: <input type="text" name="dni" required><br>
            Nombre: <input type="text" name="nombre" required><br>
            Apellidos: <input type="text" name="apellidos" required><br>
            Dirección: <input type="text" name="direccion" required><br>
            Localidad: <input type="text" name="localidad" required><br>
            Contraseña: <input type="password" name="clave" required><br>
            Repetir contraseña: <input type="password" name="repclave" required><br>
            Tipo: 
            <select name="tipo" required>
                <option value="cliente">cliente</option>
                <option value="admin">admin</option>
            </select><br><br>
            <a href="Login.php"><button type="button">Ir a login</button></a>
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
        
        <?php
            if ($errorUsuario == true){
                echo "<br><p span style='color:red'>Usuario ya existe</p>";
            }else if ($errorUsuario == false && $errorContraseña == true){
                echo "<br><p span style='color:red'>Las contraseñas no coinciden</p>";
            }
        ?>
    </body>
</html>
