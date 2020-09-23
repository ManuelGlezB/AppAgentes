<head>

    <!-- Aplico el favicon, la tipología de caracteres, algunas cosas más y cargo bootstrap -->
    <link rel="icon" type="image/ico" href="img/icon16.ico"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Aquí tengo los estilos propios de mi diseño-->
    <link rel="stylesheet" href="css/estilos.css">

    <script src="js/simpleModal.js"></script>

</head>

<?php

// INICIO DE LA CONFIGURACIÓN GENERAL (Ahora en PHP porque estoy generando variables GLOBALES)

// Email de envio para cuando quiera enviar correos
$email_info       = "info@subastafacil.net";
$clave_email_info = "vt9cJ+qF9NDzmq*";
$servidor_correo  = "smtp.ionos.es";

// Email de destino en el que el usuario me puede responder
$email_info_destino = "info@subastafacil.com";

// Configuracion de la base de datos (informacion con tablas de subastas)
$host_bbdd    = "localhost889";
$usuario_bbdd = "no sé cual es";
$clave_bbdd   = "no sé cual es";
//$conexion_bbdd = mysql_connect($host_bbdd, $usuario_bbdd, $clave_bbdd) or die("Error durante la conexión a la Base de Datos");
$bbdd = "Agentes";

// Configuracion de la base de datos de lectura para comprobar el número expediente y lote de la subasta
$host_bbdd_lectura    = "localhost889";
$usuario_bbdd_lectura = "no sé cual es";
$clave_bbdd_lectura   = "no sé cual es";
//$conexion_bbdd_lectura = mysql_connect($host_bbdd, $usuario_bbdd, $clave_bbdd) or die("Error durante la conexión a la Base de Datos");
$bbdd_lectura = "Agentes";

// DATOS DE ACCESO AL FTP SEGURO DONDE ALMACENAMOS LOS FICHEROS DE LAS SUBASTAS. En el servidor MAMP no sé cómo configurar un usuario FTP
$host_ftp    = "ssh.es-02.paas.net";
$usuario_ftp = "sepia-face";
$clave_ftp   = "djwHSw2";

?>