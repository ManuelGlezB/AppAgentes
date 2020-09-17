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
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal header default</h4>
                </div>
                <div class="modal-body">
                    <p>Modal text default.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

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
                <input name="archivo" id="archivo" type="file" />
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

    <?php include "footer.php" ?>
 
    <script>

        /* GET SUCESS POR LA REQUEST */
        var url = "insertauction.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: "success", 
           success: function(data)             
           {
             //alert(data);               
           }
       });


        if (typeof sucess !== 'undefined') {
            //existe sucess
            if (sucess == 1) {
                $(".modal-title").html("Éxito");
                $(".modal-body").html("Subasta insertada con éxito");
                $("#myModal").modal('show');
            } else if (sucess == 0) {
                $(".modal-title").html("Error");
                $(".modal-body").html("Subasta no insertada. Vuelve a intentarlo.");
                $("#myModal").modal('show');
            }
        } else {
            //no existe sucess
            //alert("sucess no existe");
        }
    </script>
</body>
</html>