<?php

  /*
  PSEUDOCODIGO
  datos = extraer del formulario
  conectar a la BBDD
  creamos la tabla de subastas sino existe
  insertaenlatabla(datos)
  */

  $idsubasta = "6";
  $expediente = $_POST["expediente"];
  $lote = $_POST["lote"];
  $refcatastral = $_POST["refcatastral"];
  $description = $_POST["description"];
  $notes = $_POST["notes"];
  $fecha = "9999-12-31";
  $idagente = "27";

  // $sql = "INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente) VALUES ($idsubasta, $expediente, $lote, $refcatastral, $description, $notes, $fecha, $idagente);";

  $sql = "INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente) VALUES (".$idsubasta.",&quot; ".$expediente."&quot;,&quot; ".$lote."&quot;,&quot; ".$refcatastral."&quot;,&quot; ".$description."&quot;,&quot; ".$notes."&quot;,&quot; ".$fecha."&quot;, ".$idagente."); " ;

  // >>>>>>>> Probar este tipo de consulta: INSERT INTO subastas (id_subasta, expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, fecha_alta, id_agente) VALUES ("2"," SUB-JA-2020-677634"," 3456"," AS5467575DSD56D"," Es una de esas casas señoriales de las de antes"," Parece que nadie vive allí"," 9999-12-31"," 27");


  echo "La consulta sql es".$sql ."<br>";

  include "connect.php";


        if($stmt = mysqli_prepare($link, $sql)){
            // // Bind variables to the prepared statement as parameters
            // mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // // Set parameters
            // $param_username = $username;
            // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // // Attempt to execute the prepared statement
            // if(mysqli_stmt_execute($stmt)){
            //     // Redirect to login page
            //     header("location: index.php");
            // } else{
            //     echo "Algo no funcionó. Inténtalo más tarde.";
            // }

            // // Close statement
            // mysqli_stmt_close($stmt);
          echo "<p>ESTA ENTRANDO EN EL IF 55555</p>";
        }


  // if (mysql_query($sql)){
  //   echo "<p>Registro agregado.</p>";
  // } else {
  //   echo "<p>No se agregó...</p>";
  // }
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