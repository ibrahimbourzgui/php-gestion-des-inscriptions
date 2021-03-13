 
    <!DOCTYPE html>
    <html lang="en">
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <script src="js/bootstrap.min.js"></script>  
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <title>Choix de filière</title>
    </head>
    <style>
    body {background-color:   dimgrey  ;}
    </style>
    <body>
    <br>
    <div class="container">
    <div class="card">
    <div class="card-body">
    <div class="row  d-flex justify-content-center">
    <div class="col">
    <h1> Espace étudiants</h1>
    </div>
    </div>
    <div class="row d-flex justify-content-center">
        <?php
 include "DB_con_class.php";
 $obj=new DB_con_class();
 $obj->createCbFiliere();
?>

<script>
    function testd() {

    var selectJP = document. getElementById('Filiere').value;
    
    if(selectJP ){
    // value of selected option
    document. getElementById('test').href ="index.php?id_filiere="+selectJP;
        <?php
        session_start();
       
        $_SESSION["Filiere"] = true;
        
        ?>
          
       }
    // To pass this value in php you can do AJAX stuff here    
}
</script>
</div>
</div>


<div class="row d-flex justify-content-center">
    <div class="col-6">
        <a id="test" href="" onclick="testd()" class="btn btn-primary ">Choisir</a>
     
        </div>
           
        </div>
        <br>
        </div>
        </div>

    </body>
    </html>