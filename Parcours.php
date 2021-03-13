<?php 
include "DB_con_class.php";
$obj=new DB_con_class();

$conn = $obj->connection();

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from parcours_etu where cne_etu='$id'"); // select query

$data = mysqli_fetch_array($qry);
$qry = mysqli_query($conn,"select * from etudiant where cne='$id'"); // select query

$data1 = mysqli_fetch_array($qry);
$qry = mysqli_query($conn,"select * from fichier where  cne_etu='$id'"); // select query
$data2 = mysqli_fetch_array($qry);
?>
<link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- Bootstrap jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script> 
    

                    <div class="card-body">
                            <div class="col d-flex justify-content-center">
                                <h2>Parcours scolaire de  <?php echo $data1['nom']?> <?php echo $data1['prenom']?></h2>
                            </div>
                        <br>
                        <div class="row">
                        <div class="col-md-6">
                               <label for="inputMoyenneBac">Moyenne générale du bac </label>
                               <input type="text" id="moy_bac" value="<?php echo $data['moy_bac'] ?>" name="moy_bac" class="form-control" placeholder="Entrer la moyenne générale" disabled >
                            </div>
                            <div class="col-md-6">
                                <label for="inputMentionBac">Mention du Baccalauréat</label>
                                <select class="form-control" id="mention_bac" name="mention_bac" disabled>
                                    <option value="passable_bac"<?=$data['mention_bac'] == 'passable_bac' ? ' selected="selected"' : '';?>>passable</option>
                                    <option value="assez_bien_bac"<?=$data['mention_bac'] == 'assez_bien_bac' ? ' selected="selected"' : '';?>>assez bien</option>
                                    <option value="bien_bac"<?=$data['mention_bac'] == 'bien_bac' ? ' selected="selected"' : '';?>>bien</option>
                                    <option value="tres_bien_bac"<?=$data['mention_bac'] == 'tres_bien_bac' ? ' selected="selected"' : '';?> >très bien</option>
                                    <option value="choix"  hidden >choisissez la mention</option>
                                  </select>
                            </div>
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputTypeBac">Type du Baccalauréat</label>
                                <select class="form-control" id="type_bac" name="type_bac" disabled>
                                    <option value="svt"<?=$data['type_bac'] == 'svt' ? ' selected="selected"' : '';?>>Sciences de la Vie et de la Terre</option>
                                    <option value="pc"<?=$data['type_bac'] == 'pc' ? ' selected="selected"' : '';?>>Sciences Physiques et Chimiques</option>
                                    <option value="math_a"<?=$data['type_bac'] == 'math_a' ? ' selected="selected"' : '';?>>Sciences Maths A</option>
                                    <option value="math_b"<?=$data['type_bac'] == 'math_b' ? ' selected="selected"' : '';?> >Sciences Maths B</option>
                                    <option value="eco" <?=$data['type_bac'] == 'eco' ? ' selected="selected"' : '';?>>Sciences Economiques</option>
                                    <option value="gestio"<?=$data['type_bac'] == 'gestio' ? ' selected="selected"' : '';?> >Techniques de Gestion et de Comptabilité</option>
                                    <option value="agronomiques"<?=$data['type_bac'] == 'agronomiques' ? ' selected="selected"' : '';?> >Sciences agronomiques</option>
                                    <option value="techno_ele" <?=$data['type_bac'] == 'techno_ele' ? ' selected="selected"' : '';?>>Sciences et Technologies Electriques</option>
                                    <option value="techno_meca"<?=$data['type_bac'] == 'techno_meca' ? ' selected="selected"' : '';?> >Sciences et Technologies Mécaniques</option>
                                    <option value="choix"  hidden >choisissez le type du Baccalauréat </option>
                                  </select>
                             </div>
                             <div class="col-md-6">
                                <label for="inputBac+2">Diplôme Bac+2</label>
                                <input type="text" class="form-control"  value="<?php echo $data['diplome_bac_p2'] ?>" id="diplome_bac_p2" name="diplome_bac_p2" placeholder=" DEUG DUT BTS DTS..." disabled>
                             </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputMentionBac+2">Mention du bac+2</label>
                                <select class="form-control" id="mention_bac_p2" name="mention_bac_p2" disabled>
                                    <option value="passable_bac_p2"<?=$data['mention_bac_p2'] == 'passable_bac_p2' ? ' selected="selected"' : '';?>>passable</option>
                                    <option value="assez_bien_bac_p2"<?=$data['mention_bac_p2'] == 'assez_bien_bac_p2' ? ' selected="selected"' : '';?>>assez bien</option>
                                    <option value="bien_bac_p2"<?=$data['mention_bac_p2'] == 'bien_bac_p2' ? ' selected="selected"' : '';?>>bien</option>
                                    <option value="tres_bien_bac_p2" <?=$data['mention_bac_p2'] == 'tres_bien_bac_p2' ? ' selected="selected"' : '';?>>très bien</option>
                                    <option value="choix"  hidden >choisissez la mention</option>
                                  </select>
                             </div>
                             <div class="col-md-6">
                                <label for="inputIntituleBac+2">Intitulé du Diplôme Bac+2</label>
                                <input type="text" class="form-control"  value="<?php echo $data['intitule_bac_p2'] ?>" id="intitule_bac_p2" name="intitule_bac_p2" placeholder="Entrer l'Intitulé du Diplôme Bac+2" disabled>
                             </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAnneeBac+2">Année d'inscription au Diplôme Bac+2</label>
                                <input type="text" class="form-control"  value="<?php echo $data['annee_insc_bac_p2'] ?>" id="annee_insc_bac_p2" name="annee_insc_bac_p2" placeholder="Entrer l'année d'inscription au Diplôme Bac+2" disabled>
                             </div>
                           <div class="col-md-6">
                            <label for="inputUnivBac+2">univérsité de votre Diplôme Bac+2</label>
                            <input type="text" class="form-control" value="<?php echo $data['univ_bac_p2'] ?>" id="univ_bac_p2" name="univ_bac_p2" placeholder="Entrer l'univérsité de votre Diplôme Bac+2" disabled>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputSemestre1">Moyenne générale du semestre 1</label>
                                <input type="number" class="form-control" value="<?php echo $data['moy_s1'] ?>" id="moy_s1" name="moy_s1" placeholder="Semestre 1" disabled>
                             </div>
                           <div class="col-md-3">
                            <label for="inputSemestre2">Moyenne générale du semestre 2</label>
                            <input type="number" class="form-control" value="<?php echo $data['moy_s2'] ?>" id="moy_s2" name="moy_s2" placeholder="Semestre 2" disabled>
                           </div>
                           <div class="col-md-3">
                            <label for="inputSemestre3">Moyenne générale du semestre 3</label>
                            <input type="number" class="form-control" value="<?php echo $data['moy_s3'] ?>" id="moy_s3" name="moy_s3" placeholder="Semestre 3" disabled>
                           </div>
                           <div class="col-md-3">
                            <label for="inputSemestre4">Moyenne générale du semestre 4</label>
                            <input type="number" class="form-control"  value="<?php echo $data['moy_s4'] ?>" id="moy_s4" name="moy_s4" placeholder="Semestre 4" disabled>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="inputSemestre4">Moyenne générale de votre Diplôme Bac+2</label>
                                <input type="number" class="form-control"  value="<?php echo $data['moy_bac_p2'] ?>" id="moy_bac_p2" name="moy_bac_p2" placeholder="Moyenne générale Bac+2" disabled>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="inputphoto">Photo de l'étudiant</label>
                                <img class="img-fluid" src="telechargement/photos/<?=$data2['photo']?>" alt="Photo">
                            </div>
                        <div class="col-md-6">
                                <label for="inputfichier">Fichier exporter par l'etudiant</label><br>
                                <iframe class="embed-responsive-item"  src="telechargement/fichiers/<?=$data2['fichier_informations']?>"></iframe>
                            </div>
                            </div>
                        <form action="admin.php" method="get">
                        <div class="row">  
                <div class="col d-flex justify-content-center">
                    <button href=""  class="btn btn-primary"><---</button>
                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>