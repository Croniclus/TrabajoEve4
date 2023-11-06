<?php
if (isset($_GET['obtenerRuta'])) {
    echo "La ruta actual es: " . getcwd();


} elseif (isset($_GET['buscarF'])) {
    
    $directorio = $_GET['nombreFichero'];
    $archivosEncontrados = glob("*".$directorio."*");

    if (!empty($archivosEncontrados)) {
        echo "Archivos encontrados relacionados con $directorio:<br>";
        foreach ($archivosEncontrados as $archivo) {
            echo $archivo . "<br>";
        }
    } else {
        echo "No se encontraron archivos en $directorio.";
    }

} elseif (isset($_GET['crearF'])) {
    $nombreArchivo = $_GET['nombreNuevoFichero'];
    $archivo = fopen($nombreArchivo, 'w');

    //prueba oara escribir
    if ($archivo) {
        $contenido = "Este es el nuevo contenido que se escribirá en el archivo.";
    
        // Escribe contenido en el archivo
        if (fwrite($archivo, $contenido) !== false) {
            echo "Se ha escrito con éxito en el archivo '$nombreArchivo'.";
        } else {
            echo "Error al escribir en el archivo.";
        }
    
        // Cierra el archivo
        fclose($archivo);
    } else {
        echo "No se pudo abrir el archivo '$nombreArchivo' para escritura.";
    }

} elseif(isset($_GET['logout'])) {
    session_destroy();
    header("Location:index.html");
}
    
?>

<form action="losDosPuntos.php" method="get">
    <input type="submit" value="Atras" name="pagina_anterior">
</form>