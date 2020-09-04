<?php
  //Get vars from request
  $idsubasta = "9"; //+1 get last id from subasta
  $expediente = $_POST["expediente"];
  $lote = $_POST["lote"];
  $refcatastral = $_POST["refcatastral"];
  $description = $_POST["description"];
  $notes = $_POST["notes"];
  $fecha = "9999-12-31"; //fecha actual
  $idagente = "30"; //= get id from user

  // Create connection
  include "connect.php";

  // Check connection
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

  //Create sql sentence
  $sql = "INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente)
  VALUES (".$idsubasta.",'".$expediente."',' ".$lote."',' ".$refcatastral."',' ".$description."',' ".$notes."', current_date() , ".$idagente."); " ;

  //Try to insert
  if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $link->error;
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