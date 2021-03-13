<?php

class DB_con_class 
{
    private $serveur;
    private $user;
    private $mdp;
    private $nom_db;

    public function connection () 
    {
        $this->serveur = "localhost";
        $this->user = "root";
        $this->mdp = "";
        $this->nom_db = "gestion_inscription";

        $con = mysqli_connect($this->serveur, $this->user, $this->mdp, $this->nom_db);
        return $con;
    }
  
    public function craeteDataTable(){
       echo' <table id="myTable" class="table table-responsive table-bordered table-hover " cellspacing="0" width="100%">
        <thead class="table-dark">
          <tr>
          <th scope="col">CNE
            </th>
            <th scope="col">CIN
            </th>
            <th scope="col">Prenom
            </th>
            <th scope="col">Nom
            </th>
            <th scope="col">Tel
            </th>
            <th scope="col">Filiere
            </th>
            <th scope="col">Adresse
            </th>
            <th scope="col">Date naiss
            </th>
            <th scope="col">Email
            </th>
            <th scope="col">
            </th>
            <th scope="col">
            </th>
            <th scope="col">
            </th>
          </tr>
        </thead>
        <tbody> ';
          
          
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "gestion_inscription";
          
          
          $conn = new mysqli($servername, $username, $password, $dbname);
        
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          if(isset($_POST['Filiere'])){
              $selected = $_POST['Filiere'];
              if (is_numeric($selected ) ) {
              $where1 = "filiere ={$selected}";
              
              }
              else $where1 = "filiere =0";
          }
          else  $where1 = "filiere like '%1%'";
          $sql = "SELECT * FROM Etudiant where $where1";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
             
              echo "<tr ><td scope=\"row\">" . $row["cne"]. "</td><td>" . $row["cin"]. "</td><td>" . $row["prenom"].
               "</td><td>" . $row["nom"]. "</td><td>". $row["tel"]. "</td><td>". $row["filiere"]. "</td><td>"
               .$row["adresse"]. "</td><td>". $row["date_naiss"]. "</td><td>". $row["email"]. "</td>" ;
               echo '<td><a href="Update.php?id='. $row['cne'].'">Modifier</a></td><td><a href="Delete.php?id=' .$row['cne']. '">Supprimer</a></td><td><a href="Parcours.php?id='. $row['cne'].'">Afficher le parcours</a></td></tr>';
            }
          } else {
            echo "0 results";
          }
          $conn->close();
          echo '</table>';
          

    }
    
    
        public function createCbFiliere()
        {
            
echo '<br><br> <div class="row">
<div class="col-sm-2">';         
 echo '<label for="Filiere">choisir une filliere : </label> </div><div class="col-md-3"><select class="form-select"  title="choisir une filiere" id="Filiere" name="Filiere" onchange="onSelectChange();" >';
 echo "<option hidden>Filiere</option>";

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "gestion_inscription";
 
 
 $conn = new mysqli($servername, $username, $password, $dbname);

 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 $sql = "SELECT * FROM Filiere";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    
     echo "<option value=\"".$row["id_filiere"]."\">".$row["libelle"]."</option>" ;
   }
 } else {
   echo "0 results";
 }
 $conn->close();
 echo '</select></div>
 </div> <br>';  

        }
    public function inserer()
    {
        $conn = $this->connection();
       // $file = addslashes(file_get_contents($_FILES["photo_id"]["tmp_name"]));
        $sql1="INSERT INTO etudiant(cne, cin, prenom, nom, tel, filiere , adresse, date_naiss, email) 
        VALUES('$_POST[cne]','$_POST[cin]','$_POST[prenom]','$_POST[nom]','$_POST[tel]',$_POST[id_filiere],'$_POST[adresse]','$_POST[date_naiss]','$_POST[email]')";

        $sql3= "INSERT INTO parcours_etu(moy_bac, mention_bac, type_bac, diplome_bac_p2,
        mention_bac_p2, intitule_bac_p2, annee_insc_bac_p2, univ_bac_p2, moy_s1, moy_s2, moy_s3, moy_s4, moy_bac_p2, cne_etu) 
        VALUES('$_POST[moy_bac]','$_POST[mention_bac]','$_POST[type_bac]','$_POST[diplome_bac_p2]','$_POST[mention_bac_p2]',
        '$_POST[intitule_bac_p2]','$_POST[annee_insc_bac_p2]','$_POST[univ_bac_p2]','$_POST[moy_s1]','$_POST[moy_s2]','$_POST[moy_s3]',
        '$_POST[moy_s4]','$_POST[moy_bac_p2]','$_POST[cne]')";


        $nom_photo = $_FILES['photo_id']['name'];
        $taille_photo = $_FILES['photo_id']['size'];
        $emplacement_photo = $_FILES['photo_id']['tmp_name'];
        $erreur_photo = $_FILES['photo_id']['error'];

        $fichier = $_FILES['parcours']['name'];
        $taille_fichier = $_FILES['parcours']['size'];
        $emplacement_fichier = $_FILES['parcours']['tmp_name'];
        $erreur_fichier = $_FILES['parcours']['error'];
        if ($erreur_photo === 0 and $erreur_fichier === 0) 
        {
            // 1030000 bits = 1mb  -- 367001 bits = 0.35mb = 350kb
            if($taille_photo > 361367001 or $taille_fichier > 5542880) 
            {
                if($taille_photo > 367001)
                {
                echo '<script language="javascript">';
                echo 'alert("La taille de la photo dépasse 350 KB")';
                echo '</script>';
                } else
                {
                    echo '<script language="javascript">';
                    echo 'alert("La du fichier dépasse 5 MB")';
                    echo '</script>';
                }
            }
            else
            {
                $photo_ex = pathinfo($nom_photo, PATHINFO_EXTENSION);
                $photo_ex_lc = strtolower($photo_ex);
                $accepte_ex_photo = array("jpg", "jpeg", "png");

                $fichier_ex = pathinfo($fichier, PATHINFO_EXTENSION);
                $fichier_ex_lc = strtolower($fichier_ex);
                $accepte_ex_fichier = array("pdf");

                if ((in_array ($photo_ex_lc, $accepte_ex_photo)) and (in_array ($fichier_ex_lc, $accepte_ex_fichier)) )
                {
                    // uniqid = genère un id 
                    $new_nom_photo = uniqid("ETU_IMG-", true).'.'.$photo_ex_lc;
                    $photo_chemin = 'telechargement/photos/'.$new_nom_photo;
                    move_uploaded_file($emplacement_photo, $photo_chemin);

                    $new_nom_fichier = uniqid("ETU_FILE-", true).'.'.$fichier_ex_lc;
                    $fichier_chemin = 'telechargement/fichiers/'.$new_nom_fichier;
                    move_uploaded_file($emplacement_fichier, $fichier_chemin);
                    //insertion dans la base de données
                    $sql2 = " INSERT INTO fichier (fichier_informations, photo, cne_etu) VALUES('$new_nom_fichier','$new_nom_photo','$_POST[cne]')";
                    mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                    mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                    mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                    echo '<script language="javascript">';
                    echo 'alert("Dossier soumis avec succès")';
                    echo '</script>';
                } 
                else 
                {
                    if ((!(in_array ($fichier_ex_lc, $accepte_ex_fichier))) and (!(in_array ($photo_ex_lc, $accepte_ex_photo)))) 
                    {
                    echo '<script language="javascript">';
                    echo 'alert("les deux fichiers importés ne respectent pas les formats demandés")';
                    echo '</script>';
                }
                else if (!(in_array ($photo_ex_lc, $accepte_ex_photo)))
                {
                    echo '<script language="javascript">';
                    echo 'alert("Ce type de photos n\'est pas accepté")';
                    echo '</script>';
                }
                else
                {
                    echo '<script language="javascript">';
                    echo 'alert("Ce type de fichiers n\'est pas accepté")';
                    echo '</script>';
                }
                }
                }
            }
            else
        {
            echo '<script language="javascript">';
            echo 'alert("ERREUR!!!")';
            echo '</script>';
            
        }
         
    }
    }
    ?>