<?php
if (isset($_POST["submit"])) {
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);

    if ($revisar !== false) {
        $image = $_FILES["image"]["tmp_name"];
        $imgContenido = addslashes(file_get_contents($image));

        //Credenciales Mysql
        $host = 'localhost:3306';
        $username = 'root';
        $password = 'example';
        $dbName = 'kodoti_wallet';

        //Crear conexion con la base de datos
        $db = new mysqli($host, $username, $password, $dbName);

        // Cerciorar la conexion
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }


        //Insertar imagen en la base de datos
        $insertar = $db->query("INSERT into images_tabla (imagenes, creado) VALUES ('$imgContenido', now())");
        // COndicional para verificar la subida del fichero

        if ($insertar) {
            echo "Archivo Subido Correctamente.";
        } else {
            echo "Ha fallado la subida, reintente nuevamente.";
        }
        // Sie el usuario no selecciona ninguna imagen
    } else {
        echo "Por favor seleccione imagen a subir.";
    }
}
?>