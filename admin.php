
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>      
 
  
 
    
    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- DataTables CSS library -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- Bootstrap jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>  
    <title>Document</title>
</head>
<style>
    body{background-color:   dimgrey  ;}
    h1{background-color:   dimgrey  ;}
    </style>
<body>

<div>
<h1  class="text-center">Formulaire d'administration</h1>
</div>             
<form action="" method="post" id="frm">
<div class="col"> 
                <div class="card">
                    <div class="card-body">
<script language="JavaScript">
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function onSelectChange(){
 document.getElementById('frm').submit();
}
</script>
<div class="respensive">
<?php
 include "DB_con_class.php";
 $obj=new DB_con_class();
 $obj->createCbFiliere();
?>

                        <div class="text-align: right" >
            
                        <label for="myInput">Recherche :  </label>
                        <input type="text" name="myInput" id="myInput" onkeyup="myFunction()" placeholder="Recherche par cne">
                        </div>
                        </div>
                    <div class="table-responsive col d-flex justify-content">
                            
                            
                            <?php
                            $obj->craeteDataTable();
                            ?>
                    </div>

                       
                    
                </div>
            </div>
          <div class="row" >
              <div class="col-sm-2 align-self-center"style="margin-left:400px ;">
                <div class=" btn btn-dange">
                  <a href="logout.php" class="btn btn-danger">Déconnexion</a>
                </div>
              </div>
            <div class="col-sm-3 align-self-center">
              <div class="btn btn-warning">
                <a href="reset-password.php" class="btn">Changer votre mot de passe</a>
              </div>
            </div>
          </div>
           <a href="register.php" class="btn btn-primary">Créer un compte pour un autre admin</a>
    </div>
</form>
</body>
</html>