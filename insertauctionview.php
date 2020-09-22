<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<?php include "head.php" ?>

<body>

    <div class="login-form">


            
        <form action="insertauction.php" method="post">
            <div class="logo-container-wrapper">
                <img src="img/cropped-subastafacil-logo.png" alt="logo subastafacil" class="logo-container">       
            </div>

            <div class="or-seperator"><i>Inserción de datos</i></div>
            
            <div class="row">
                <div class="col-xs-7 form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                        <input type="text" class="form-control" name="expediente" placeholder="ID Subasta" required="required">
                    </div>
                </div>
                <div class="col-xs-5 form-group">
                    <div class="input-group" max-width= "40%">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="clave" class="form-control" name="lote" placeholder="Lote" required="required">
                    </div>
                </div>        
            </div>    

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-o"></i></span>
                    <input type="clave" class="form-control" name="refcatastral" placeholder="Ref.Catastral" required="required">
                </div>
            </div>        
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-thumbs-o-up"></i></span>
                    <input type="clave" class="form-control" name="description" placeholder="Descripción Detallada a Publicar" required="required">
                </div>
            </div>        
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                    <input type="clave" class="form-control" name="notes" placeholder="Notas Privadas -No se publican-" required="required">
                </div>
            </div>        
            <div class="text-center social-btn">
                <a href="#" class="btn btn-success btn-block"><i class="fa fa-file-image-o"></i>Añade Imágenes y Videos</a>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-danger btn-block">
            </div>     
        </form>
        <div class="hint-text small" ><a href="doc/RamonSanso-SabiduriaFinanciera.pdf" target="_blank" class="text-success">Ver Acuerdo y Condiciones de Uso del Agente</a></div>
        <div class="hint-text small"><a href="#" class="text-success">Ver Documento Propuesta a Deudores</a></div>
    </div>

        <div class="page-header"  style="text-align: center;">
            <h3><br><?php echo htmlspecialchars($_SESSION["email"]); ?></b></h3>
            <div class="row" >
                <a href="reset-password.php" class="btn btn-warning">Resetear Clave</a>
                <a href="logout.php" class="btn btn-danger">Salir</a>
            </div>
        </div>


<?php
    $success = $_GET["success"];
    if ($success == "ok") 
    {
    echo '
<div class="container">
<h2>Modal Example</h2>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
      <p>Some text in the modal.</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  
</div>
</div>

</div>
'







    ' 
    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>'

    ;
    } 

?>




    <?php include "footer.php" ?>

</body>

</html>