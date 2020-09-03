<?php

  /*
  PSEUDOCODIGO
  datos = extraer del formulario
  conectar a la BBDD
  creamos la tabla de subastas sino existe
  insertaenlatabla(datos)
  */

  $idsubasta = "2";
  $expediente = $_POST["expediente"];
  $lote = $_POST["lote"];
  $refcatastral = $_POST["refcatastral"];
  $description = $_POST["description"];
  $notes = $_POST["notes"];
  $fecha = "9999-12-31";
  $idagente = "27";

  // $sql = "INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente) VALUES ($idsubasta, $expediente, $lote, $refcatastral, $description, $notes, $fecha, $idagente);";

  $sql = "INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente) VALUES (".$idsubasta.", ".$expediente.", ".$lote.", ".$refcatastral.", ".$description.", ".$notes.", ".$fecha.", ".$idagente."); " ;

  echo "La consulta sql es";  
  echo $sql ; <br>

  include "connect.php";

  if (mysql_query($sql)){
    echo "<p>Registro agregado.</p>";
  } else {
    echo "<p>No se agregó...</p>";
  }
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