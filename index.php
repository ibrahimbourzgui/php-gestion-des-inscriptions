<?php
// Initialize the session

 
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_GET['id_filiere']) ){
    header("location: accueil.php");
    exit;
}

?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_GET['id_filiere']) ){
if(!isset($_SESSION["Filiere"]) || $_SESSION["Filiere"] !== true  ){
    header("location: accueil.php");
    exit;
}
}
?>
<!DOCTYPE html>
<html lang="fr">
    
<head>
    <title>Formulaire d'inscription</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- Bootstrap jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>   
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="form-group">
            <h1 class="text-center">Formulaire d'inscription</h1>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col d-flex justify-content-center">
                            <h2>Informations personnelles</h2>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                               <label for="inputname">CNE</label>
                               <input type="text" class="form-control" name="cne" id="cne" placeholder="Entrer votre CNE" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputname">Code d'identité nationale</label>
                                <input type="text" class="form-control" name="cin" id="cin" placeholder="Entrer votre CIN" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputPrenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer votre Prénom" required>
                             </div>
                             <div class="col-md-6">
                                <label for="inputNom">nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom" required>
                             </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputDateNaiss">Date de naissance</label>
                                <input type="date" min="1980-01-01" max="2004-03-30" name="date_naiss" id="date_naiss" class="form-control" required>
                             </div>
                             <div class="col-md-6">
                                <label for="inputTelephone">Téléphone</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Entrer votre numéro de Téléphone" required>
                             </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputEmail">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                             </div>
                           <div class="col-md-6">
                            <label for="inputAdresse">Adresse</label>
                            <textarea class="form-control" Type="text" rows="3" name="adresse" id="adresse" placeholder="Entrer votre adresse" required ></textarea>
                           </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <br>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col d-flex justify-content-center">
                            <h2>Parcours scolaire</h2>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                               <label for="inputMoyenneBac">Moyenne générale du bac</label>
                               <input type="number" id="moy_bac" step="0.01" min="0" max="20" name="moy_bac" class="form-control" placeholder="Entrer la moyenne générale" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputMentionBac">Mention du Baccalauréat</label>
                                <select class="form-control" id="mention_bac" name="mention_bac" required>
                                    <option value="passable_bac">passable</option>
                                    <option value="assez_bien_bac">assez bien</option>
                                    <option value="bien_bac">bien</option>
                                    <option value="tres_bien_bac" >très bien</option>
                                    <option value="choix"  hidden selected>choisissez la mention</option>
                                  </select>
                            </div>
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputTypeBac">Type du Baccalauréat</label>
                                <select class="form-control" id="type_bac" name="type_bac" required>
                                    <option value="svt">Sciences de la Vie et de la Terre</option>
                                    <option value="pc">Sciences Physiques et Chimiques</option>
                                    <option value="math_a">Sciences Maths A</option>
                                    <option value="math_b" >Sciences Maths B</option>
                                    <option value="eco" >Sciences Economiques</option>
                                    <option value="gestio" >Techniques de Gestion et de Comptabilité</option>
                                    <option value="agronomiques" >Sciences agronomiques</option>
                                    <option value="techno_ele" >Sciences et Technologies Electriques</option>
                                    <option value="techno_meca" >Sciences et Technologies Mécaniques</option>
                                    <option value="choix"  hidden selected>choisissez le type du Baccalauréat </option>
                                  </select>
                             </div>
                             <div class="col-md-6">
                                <label for="inputBac+2">Diplôme Bac+2</label>
                                <input type="text" class="form-control" id="diplome_bac_p2" name="diplome_bac_p2" placeholder=" DEUG DUT BTS DTS..." required>
                             </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputMentionBac+2">Mention du bac+2</label>
                                <select class="form-control" id="mention_bac_p2" name="mention_bac_p2" required>
                                    <option value="passable_bac_p2">passable</option>
                                    <option value="assez_bien_bac_p2">assez bien</option>
                                    <option value="bien_bac_p2">bien</option>
                                    <option value="tres_bien_bac_p2" >très bien</option>
                                    <option value="choix"  hidden selected>choisissez la mention</option>
                                  </select>
                             </div>
                             <div class="col-md-6">
                                <label for="inputIntituleBac+2">Intitulé du Diplôme Bac+2</label>
                                <input type="text" class="form-control" id="intitule_bac_p2" name="intitule_bac_p2" placeholder="Entrer l'Intitulé du Diplôme Bac+2" required>
                             </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAnneeBac+2">Année d'inscription au Diplôme Bac+2</label>
                                <input type="number" class="form-control" min="2010" step="1" max="2019" id="annee_insc_bac_p2" name="annee_insc_bac_p2" placeholder="Entrer l'année d'inscription au Diplôme Bac+2" required>
                             </div>
                           <div class="col-md-6">
                            <label for="inputUnivBac+2">univérsité de votre Diplôme Bac+2</label>
                            <input type="text" class="form-control" id="univ_bac_p2" name="univ_bac_p2" placeholder="Entrer l'univérsité de votre Diplôme Bac+2" required>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputSemestre1">Moyenne générale du semestre 1</label>
                                <input type="number" class="form-control" step="0.01" min="0" max="20" id="moy_s1" name="moy_s1" placeholder="Semestre 1" required>
                             </div>
                           <div class="col-md-3">
                            <label for="inputSemestre2">Moyenne générale du semestre 2</label>
                            <input type="number" class="form-control" step="0.01" min="0" max="20" id="moy_s2" name="moy_s2" placeholder="Semestre 2" required>
                           </div>
                           <div class="col-md-3">
                            <label for="inputSemestre3">Moyenne générale du semestre 3</label>
                            <input type="number" class="form-control"step="0.01" min="0" max="20" id="moy_s3" name="moy_s3" placeholder="Semestre 3" required>
                           </div>
                           <div class="col-md-3">
                            <label for="inputSemestre4">Moyenne générale du semestre 4</label>
                            <input type="number" class="form-control" step="0.01" min="0" max="20" id="moy_s4" name="moy_s4" placeholder="Semestre 4" required>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="inputSemestre4">Moyenne générale de votre Diplôme Bac+2</label>
                                <input type="number" class="form-control"step="0.01"  min="0" max="20" id="moy_bac_p2" name="moy_bac_p2" placeholder="Moyenne générale Bac+2" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col d-flex justify-content-center">
                            <h2>Documents à importer</h2>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Attention!!!</h4>
                                    veuillez importer un fichier PDF qui comporte votre BAC, CIN(RECTO-VERSO), 
                                    Diplôme BAC+2 ou attestation, relevés de notes (S1, S2, S3, S4)  
                                    le tout dans un seul fichier PDF qui ne dépasse pas 5MB . <br>
                                    La photo ne doit pas dépasser 350 kO et doit être de format jpg, jpeg, png. 
                                    <hr>
                                    <p class="mb-0">Si vous ne respectez pas les tailles et les formats demandés vous risquez de perdre le formulaire et recommencez la saisie.</p>
                                  </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-5">
                                <label for="inputphotoid">Photo d'identité</label>
                                <input type="file" class="form-control" name="photo_id" id="photo_id" required>
                            </div>
                            <div class="col-md-5">
                                <label for="inputcinrecto">Informations et parcours</label>
                                <input type="file" class="form-control" name="parcours" id="parcours" required>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="id_filiere" name="id_filiere" value="<?php $id = $_GET['id_filiere']; echo $id;?>" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">  
                <div class="col d-flex justify-content-center">
                    <button type="submit" name="soumettre" class="btn btn-primary">Soumettre le dossier</button>
                </div>
                
               
                             
                        </div>
            </div>
            <br>
        </form>
    </div>
    <?php 
    if(isset($_POST['soumettre']))
    {
        include "DB_con_class.php";
        $obj=new DB_con_class();
        $obj->inserer();
    }
    ?>
   <?php
   session_destroy();
   ?> 
</body>
</html>