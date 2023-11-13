<?php

session_start();

$coockie_duraction = 3600 * 24 * 30;

if($_POST["user"] == "admin" && $_POST["password"] == "1234" || $_POST["user"] == "cliente1" && $_POST["password"] == "password1"){
    $user = $_POST["user"];
    $pass = $_POST["password"];
    if($user == "admin" ){
        $rol["user"] = "sudo";
    }else{
        $rol["user"] = "normal";
    }

    if(isset($_POST["recordarme"])){
        setcookie("user", $user ,time() + $coockie_duraction);
    }


    $_SESSION["user"] = "admin";
    echo "Hola ".$_SESSION["user"];

    if(isset($_SESSION["user"])){
        echo"<br>";
        echo"Esta es la pagina principal de ".$_SESSION["user"];
        $timestamp = date("Y-m-d H:i:s");

    ?>

    <form action="tareas.php" method="get">
        <input type="submit" name="obtenerRuta" value="Obtener ruta actual">
        <br>
        <br>
        <input type="text" placeholder="Fichro a buscar" name="nombreFichero">
        <br>
        <input type="submit" name="buscarF" value="Buscar Fichero">
        <br><br>
        <?php
        if($rol["user"] == "sudo"){
            echo '<input type="text" placeholder="Fichero a crear" name="nombreNuevoFichero">
            <br>
            <input type="submit" name="crearF" value="Crear un fichero">'; 
        }
        
        ?>
    </form>

    <form action="tareas.php" method="get">
        <input type="submit" name="logout" value="Salir">
    </form>

    <?php

        }else{
            echo "No esta iniciada la sesion...";
        }
    }
    ?>
