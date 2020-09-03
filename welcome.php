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
            <h3><br><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h3>
            <div row >
                <a href="reset-password.php" class="btn btn-warning">Resetear Clave</a>
                <a href="logout.php" class="btn btn-danger">Salir</a>
            </div>
        </div>



    <?php include "footer.php" ?>

</body>

</html>