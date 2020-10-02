<?php

  session_start();

  //Get vars from request
  $expediente = $_POST["expediente"];
  $lote = $_POST["lote"];
  $refcatastral = $_POST["refcatastral"];
  $description = $_POST["description"];
  $notes = $_POST["notes"];
  $idagente = ($_SESSION["id_agente"]); //= get id from user select id_agente from users
  $countfiles = count($_FILES['file']['name']);

  // Create connection
  require_once "connect.php";

  // Check connection
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

  //checking image files values
  for ($i = 0; $i < $countfiles; $i++) {
   
    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['file']['name'][$i];
    echo "nombre de archivo ".$archivo;

    if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['file']['type'][$i];
      $tamano = $_FILES['file']['size'][$i];
      $temp = $_FILES['file']['tmp_name'][$i];

      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
      if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/> - Se permiten archivos .gif, .jpg, .png. y de 2000 kb como máximo.</b></div>';
      } else {
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'images/'.$archivo)) {
          //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
          chmod('images/'.$archivo, 0777);
          //Mostramos el mensaje de que se ha subido co éxito
          echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
          //Mostramos la imagen subida
          //echo '<p><img src="images/'.$archivo.'"></p>';
        }
      }

      //insertamos la ruta de la imagen en BBDD
      $sql_insert_multimedia = "INSERT INTO Multimedia (id_subasta, nombre_fichero, tipo_fichero, ubicacion_fichero) VALUES (?, ?, ? ,?)";

      //Preparamos para insertar en BBDD
      if ($stmt = mysqli_prepare($link,$sql_insert_multimedia)) {
        mysqli_stmt_bind_param($stmt,"isss", $param_id_subasta, $param_nombre_fichero, $param_tipo_fichero, $param_ubicacion_fichero);

        $param_id_subasta = 123; //$_POST[id_subasta]
        $param_nombre_fichero = $archivo;
        $param_tipo_fichero = $tipo;
        $param_ubicacion_fichero = "url/images"; //url + /carpeta_expediente_subasta/ + $archivo

        if (mysqli_stmt_execute($stmt)) {
          echo "Se ha insertado correctamente el objeto multimedia.";
        } else {
            echo "Algo no funcionó. Inténtalo más tarde.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
      } else {
        echo "Fallo el prepare";
      }
    }
  }

  // Prepare an insert statement
  $sql = "INSERT INTO subastas ( expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, id_agente) VALUES (?, ?, ?, ?, ?, ?)";

  if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sisssi", $param_expediente, $param_lote, $param_refcatastral, $param_description, $param_notes, $param_idagente );
      
    // Set parameters
    $param_expediente = $expediente;
    $param_lote = $lote;
    $param_refcatastral = $refcatastral; 
    $param_description = $description;
    $param_notes = $notes;
    $param_idagente = $idagente;


    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      // Redirect to insertauctionview page
      //header("location: insertauctionview.php?success=ok");
    } else {
      header("location: insertauctionview.php?success=no-ok");
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
  }
  
  // Close connection
  mysqli_close($link);
?>





