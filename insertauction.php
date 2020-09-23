<?php

  session_start();

  //Get vars from request
  $expediente = $_POST["expediente"];
  $lote = $_POST["lote"];
  $refcatastral = $_POST["refcatastral"];
  $description = $_POST["description"];
  $notes = $_POST["notes"];
  $idagente = ($_SESSION["id_agente"]); //= get id from user select id_agente from users

  // Create connection
  require_once "connect.php";

  // Check connection
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }


//>>>>>>>>>>>>>>>>>>
// Prepare an insert statement

$sql = "INSERT INTO subastas ( expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, id_agente) VALUES (?, ?, ?, ?, ?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
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
    // Redirect to login page
    echo "Funcionó";
    header("location: insertauctionview.php?success=ok");

    //                header("location: index.php");
  } else {
    echo "Algo no funcionó. Inténtalo más tarde.";
    header("location: insertauctionview.php?success=no-ok");

  // Prepare an insert statement
  $sql = "INSERT INTO subastas ( expediente_subasta, lote_subasta, ref_catastral, descrip_detallada, notas_privadas, id_agente) VALUES (?, ?, ?, ?, ?, ?)";

  if ($stmt = mysqli_prepare($link, $sql)){
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
 
      // POST POR LA REQUEST SUCESS
      $success = $_POST['success'];
      echo "success: ".$usuario; 
      header("location: insertauctionview.php");
    } else {
      echo "Algo no funcionó. Inténtalo más tarde.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }
  // Close connection
  mysqli_close($link);
?>


