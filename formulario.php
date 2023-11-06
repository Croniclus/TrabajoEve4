<?php

session_start();

/*if($_POST["user"] == "admin" && $_POST["password"] == "1234"){
    $_SESSION["user"] = "admin";
    echo "Hola ".$_SESSION["user"];
    header("Location:home.php");
}*/

if($_POST["user"] == "admin" && $_POST["password"] == "1234"){
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
        <input type="text" placeholder="Fichero a crear" name="nombreNuevoFichero">
        <br>
        <input type="submit" name="crearF" value="Crear un fichero">
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
