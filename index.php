<?php
//Global var
$id_agente_global = 0;

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include connect file
require_once "connect.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Pon tu Email";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Pon tu Clave";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_agente, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id_agente, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_agente"] = $id_agente;
                            $_SESSION["email"] = $email;
                            $id_agente_global = $_SESSION["id_agente"];                        
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La Clave No Es Válida";
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    $email_err = "No se han encontrado ninguna cuenta con este Email";
                }
            } else{
                echo "Oops! Algo pasó. Vuelve a intentarlo más tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/ico" href="img/icon16.ico"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="login-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="logo-container-wrapper">
                <img src="img/cropped-subastafacil-logo.png" alt="logo subastafacil" class="logo-container"/>
            </div>
            <!-- RRSS LOGIN -->
            <div class="text-center social-btn">
                <a href="#" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Regístrate con <b>Facebook</b></a>
                <a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Regístrate con <b>Twitter</b></a>
                <a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Regístrate con <b>Google</b></a>
            </div>
            
            <div class="or-seperator"><i>o con tu email</i></div>
            <!-- NORMAL LOGIN  -->
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="email" class="form-control" placeholder="Tu Email" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" class="form-control" placeholder="Clave">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block login-btn" value="Accede" width="200">
            </div>
            <p>¿No tienes cuenta? <a href="register.php">Regístrate Ahora</a>.</p>
        </form>
    </div>    
</body>
</html>