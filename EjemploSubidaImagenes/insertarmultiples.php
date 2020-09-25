<head>
   <link rel="stylesheet" href="css/styles.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<?php 
if(isset($_POST['submit'])){
 
   // Count total files
   $countfiles = count($_FILES['file']['name']);

   //connect to DB
   require_once "connect.php";
   // Looping all files
   for ($i = 0; $i < $countfiles; $i++) {
   
      //Recogemos el archivo enviado por el formulario
      $archivo = $_FILES['file']['name'][$i];
      if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
         $tipo = $_FILES['file']['type'][$i];
         $tamano = $_FILES['file']['size'][$i];
         $temp = $_FILES['file']['tmp_name'][$i];

         //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
         if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. y de 2000 kb como máximo.</b></div>';
         } else {
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, 'images/'.$archivo)) {
               //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
               chmod('images/'.$archivo, 0777);
               //Mostramos el mensaje de que se ha subido co éxito
               echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
               //Mostramos la imagen subida
               //echo '<p><img src="images/'.$archivo.'"></p>';
               

               $sql = "INSERT INTO Multimedia (id_subasta, nombre_fichero, tipo_fichero, ubicacion_fichero) VALUES (?, ?, ? ,?)";

               //Preparamos para insertar en BBDD
               if ($stmt = mysqli_prepare($link,$sql)) {
                  mysqli_stmt_bind_param($stmt,"isss", $param_id_subasta, $param_nombre_fichero, $param_tipo_fichero, $param_ubicacion_fichero);

                  $param_id_subasta = 123; //$_POST[id_subasta]
                  $param_nombre_fichero = $archivo;
                  $param_tipo_fichero = $tipo;
                  $param_ubicacion_fichero = "url/images"; //url + /carpeta_expediente_subasta/ + $archivo

                  if(mysqli_stmt_execute($stmt)) {
                     // header("location: insertMultimedia.php");
                  } else {
                     echo "Algo no funcionó. Inténtalo más tarde.";
                  }
                  // Close statement
                  mysqli_stmt_close($stmt);
               } else {
                  echo "Fallo el prepare";
               }
               
            } else {
               //Si no se ha podido subir la imagen, mostramos un mensaje de error
               echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
         }
      }
   }
   // Close connection
   mysqli_close($link);
} 
?>

<form method='post' action='' enctype='multipart/form-data'>
   <p>Selecciona las imagenes a subir (límite de 4 a la vez)</p>
   <input type="file" name="file[]" id="file" multiple accept=".gif,.jpg,.jpeg,.png">
   <input type='submit' name='submit' value='Upload'>
</form>


<h1>Galería de miniaturas</h1>
<p>Pasa es ratón por encima para ver la imagen en grande.</p>
<div class="gallery"></div>

<script>
   var folder = "images/";

   $.ajax({
      url : folder,
      success: function (data) {
         $(data).find("a").attr("href", function (i, val) {
            if( val.match(/\.(jpe?g|png|gif)$/) ) { 
               $(".gallery").append( "<div><img src='"+ folder + val +"'><img src='"+ folder + val +"'></div>" );
            } 
         });
      }
   });
</script>