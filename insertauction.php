<?php
  /*
    TAREA MANUEL
    modificar la funcion de tiempo en SQL para que añade tambien horas, min y segundos
  */

  session_start();

  //Get vars from request
  //$idsubasta = "16"; +1 get last id from subasta 
  $expediente = $_POST["expediente"];
  $lote = $_POST["lote"];
  $refcatastral = $_POST["refcatastral"];
  $description = $_POST["description"];
  $notes = $_POST["notes"];
  $idagente = "11";
  //$idagente = ($_SESSION["id_agente"]); //= get id from user select id_agente from users

  // Create connection
  include "connect.php";

  // Check connection
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

  //Create sql sentence for get id of auction
  $idsubasta_sql = "SELECT id_subasta
  FROM subastas
  ORDER BY id_subasta DESC
  LIMIT 1;";

  //Try to get id auction
  if ($idsubasta = $link->query($idsubasta_sql) === TRUE) {

    /*$idsubasta++;*/

    //Create sql sentence
    $sql = "INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente)
    VALUES (".$idsubasta.",'".$expediente."',' ".$lote."',' ".$refcatastral."',' ".$description."',' ".$notes."', current_date() , ".$idagente."); " ;

    //Try to insert
    if ($link->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error intentando insertar con: " . $sql . "<br>" . $link->error;
    }
  } else if ($idsubasta = $link->query($idsubasta_sql) === FALSE) {
    echo "FALSE Error obteniendo id subasta con: " . $idsubasta . "<br>" . $link->error;
  } else {
    echo "VOID Error obteniendo id subasta con: " . $idsubasta . "<br>" . $link->error;
  }

  //Close connection
  $link->close();
?>

<html>
<?php include "head.php" ?>
<body>

  <h4>Agregando el siguiente registro</h4>

  <p>Tu Id Subasta es <?php echo $_POST["expediente"]; ?><br></p>
  <p>Tu lote es: <?php echo $_POST["lote"]; ?></p>
  <p>Tu refcatastral es: <?php echo $_POST["refcatastral"]; ?></p>
  <p>Tu description es: <?php echo $_POST["description"]; ?></p>
  <p>Tu notes es: <?php echo $_POST["notes"]; ?></p>

  <?php include "footer.php" ?>
</body>
</html>