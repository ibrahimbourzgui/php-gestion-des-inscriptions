<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: admin.php");
  exit;
}
 
// Include config file
require_once "DB_con_class.php";
$obj=new DB_con_class();

$link = $obj->connection();
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "ENTRER l/'utilisateur.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "enterer le mot de passe.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: admin.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "mot de passe invalide.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "aucun compte trouver avec ce nom d/'utilisateur.";
                }
            } else{
                echo "Oops! erreur, essayez une autre fois.";
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
<style>
    body{background-color:   dimgrey  ;}
    h1{background-color:   dimgrey  ;}
    </style>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- Bootstrap jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script> 
</head>
<body>
<br>
<div class="container">
    <div class="col">
    <div class="card">
    <div class="card-body ">
    <div class="row">
    <div class="col d-flex justify-content-center">
        <h2>Connexion</h2>
        </div>
        <div class="row ">
        <div class="col d-flex justify-content-center">
        <p>Enter vos Informations pour se connecter.</p>
        </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <div class="row d-flex justify-content-center">
            <div class="col-6">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                </div>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <div class="row d-flex justify-content-center">
            <div class="col-6 ">
                <label>Mot de passe</label>
                
                <input type="password" name="password" class="form-control">
                </div>
                </div>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
            <div class="col-6">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            
           
            </div>
            </div>
            </div>
        </form>
        </div>
    </div> 
    </div>   
    </div>
    </div>
</body>
</html>