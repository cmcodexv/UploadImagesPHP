<?php
if (!empty($_GET['id'])) {
    //Credenciales de conexion
    $host = 'localhost:3306';
    $username = 'root';
    $password = 'example';
    $dbName = 'kodoti_wallet';

    //Crear conexion mysql
    $db = new mysqli($host, $username, $password, $dbName);

    //revisar conexion
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT imagenes FROM images_tabla WHERE id = {$_GET['id']}");

    if ($result->num_rows > 0) {
        $imgDatos = $result->fetch_assoc();

        //Mostrar Imagen
        header("Content-type: image/jpg");
        echo $imgDatos['imagenes'];
    } else {
        echo 'Imagen no existe...';
    }
}
?>