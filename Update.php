<?php

include "DB_con_class.php";
$obj=new DB_con_class();

$conn = $obj->connection();

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from etudiant where cne='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $date_naiss = $_POST['date_naiss'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $filiere = $_POST['Filiere'];
  
	
    $edit = mysqli_query($conn,"update Etudiant set cin='$cin', nom='$nom', prenom='$prenom', tel='$tel', date_naiss='$date_naiss'
    , email='$email', adresse='$adresse', filiere='$filiere' where cne='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:admin.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    } 
    $conn->close();   	
}
?>
 <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- Bootstrap jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>  
    <form method="POST">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col d-flex justify-content-center">
                            <h2>Modifier les Informations personnelles :</h2>
                        </div>                       <br>

                            <div class="row">
                            <div class="col-md-6">
                                <label for="inputname">Code d'identité nationale</label>
                                <input type="text" value="<?php echo $data['cin'] ?>" class="form-control" name="cin" id="cin" placeholder="Entrer votre CIN" required>
                            </div>
                        
                        <br>
                       
                            <div class="col-md-6">
                                <label for="inputPrenom">Prénom</label>
                                <input type="text" value="<?php echo $data['prenom'] ?>" class="form-control" name="prenom" id="prenom" placeholder="Entrer votre Prénom" required>
                             </div>
                            </div>
                             <div class="row">
                             <div class="col-md-6">
                                <label for="inputNom">nom</label>
                                <input type="text" value="<?php echo $data['nom'] ?>" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom" required>
                             </div>
                        
                        <br>
                        
                            <div class="col-md-6">
                                <label for="inputDateNaiss">Date de naissance</label>
                                <input type="date" value="<?php echo $data['date_naiss'] ?>" name="date_naiss" id="date_naiss" class="form-control" required>
                             </div>
                             </div>
                             <div class="row">
                             <div class="col-md-6">
                                <label for="inputTelephone">Téléphone</label>
                                <input type="text" value="<?php echo $data['tel'] ?>" class="form-control" name="tel" id="tel" placeholder="Entrer votre numéro de Téléphone" required>
                             </div>
                      
                        <br>
                        
                            <div class="col-md-6">
                                <label for="inputEmail">E-mail</label>
                                <input type="email" value="<?php echo $data['email'] ?>" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                             </div>
                             <div class="row">  
                           <div class="col-md-6">
                            <label for="inputAdresse">Adresse</label>
                            <input type="text" class="form-control" value="<?php echo $data['adresse'] ?>"Type="text" rows="3" name="adresse" id="adresse" placeholder="Entrer votre adresse" required ></textarea>
                           </div>
                        
                       
                      

 <?php
 
 $obj=new DB_con_class();
 
 $conn = $obj->connection();
 $sql = "SELECT * FROM Filiere";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
    echo '<div class="col-md-6"><label for="Filiere">choisir une filliere : </label><select class="form-select"  title="choisir une filiere" id="Filiere" name="Filiere" onchange="onSelectChange();" >';
    echo "<option hidden>Filiere</option>";
   // output data of each row
   while($row = $result->fetch_assoc()) {
    if($row["id_filiere"] == $data["filiere"]) 
    { echo "<option value=\"".$row["id_filiere"]."\" selected=\"selected\" >".$row["libelle"]."</option>" ;
    }
     else echo "<option value=\"".$row["id_filiere"]."\"  >".$row["libelle"]."</option>";
   }
 } else {
   echo "0 results";
 }
 $conn->close();
 
                        

?>
</div>
</select>
</div>
<br>
<br><br>
<br><br>
<div class="row">  
                <div class="col d-flex justify-content-center">
<input type="submit" name="update" value="Modifier" class="btn btn-primary">
</div>
</div>
 </div>

            </div>
</form>
