<?php
/*
  Lógica dependiente insertauction.php
*/

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

      $sql_get_last_id_subasta = "SELECT id_subasta FROM subastas ORDER BY id_subasta DESC LIMIT 1";

      /*if ($stmt_get_id = mysqli_prepare($link,$sql_get_last_id_subasta)) {

        if ($resultado = mysqli_stmt_execute($stmt_get_id)) {

            // obtener array asociativo
            while ($row = mysqli_fetch_assoc($resultado)) {
                printf ("%s (%s)\n", $row["id_subasta"]);
            }
        
            // liberar el conjunto de resultados
            mysqli_free_result($resultado);
        }


      } else {
          echo "Algo no funcionó. Inténtalo más tarde.";
      }*/

      $consulta = "SELECT id_subasta FROM subastas ORDER BY id_subasta DESC LIMIT 1";

      if ($resultado = mysqli_query($link, $consulta)) {

          /* obtener array asociativo */
          while ($row = mysqli_fetch_assoc($resultado)) {
              echo "idsubasta" . $row["id_subasta"];
          }

          /* liberar el conjunto de resultados */
          mysqli_free_result($resultado);
      }

      /* cerrar la conexión */
      mysqli_close($link);

      //Preparamos para insertar en BBDD
      /*if ($stmt = mysqli_prepare($link,$sql_insert_multimedia)) {
        mysqli_stmt_bind_param($stmt,"isss", $param_id_subasta, $param_nombre_fichero, $param_tipo_fichero, $param_ubicacion_fichero);

        if ($stmt_get_id = mysqli_prepare($link,$sql_get_last_id_subasta)) {

          $last_id_subasta = 0;
          if ($last_id_subasta = mysqli_stmt_execute($stmt_get_id)) {
            echo "Se ha extraido el id subasta correctamente.";
          } else {
              echo "Algo no funcionó. Inténtalo más tarde.";
          }

          $param_id_subasta = $last_id_subasta + 1;
          $param_nombre_fichero = $archivo;
          $param_tipo_fichero = $tipo;
          $param_ubicacion_fichero = "url/images"; //url + /carpeta_expediente_subasta/ + $archivo

          if (mysqli_stmt_execute($stmt)) {
            echo "Se ha insertado correctamente el objeto multimedia.";
          } else {
              echo "Algo no funcionó. Inténtalo más tarde.";
          }
        }
        // Close statement
        mysqli_stmt_close($stmt);
      } else {
        echo "Fallo el prepare";
      }*/
    }
  }
  ?>