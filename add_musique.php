<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Creer un compte sur lyrics243</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" method="post" action="info/add_mus.php" enctype="multipart/form-data">
					<span class="login100-form-title p-b-33">
						Ajouter votre musique
					</span>
                <?php if(isset($_SESSION['err'])):?>
                    <?php foreach ($_SESSION['err'] as $err):?>
                        <li><?=$err;?></li>
                    <?php endforeach;?>
                <?php unset($_SESSION['err']);endif;?>
                <?php
                    include_once 'data/album.fonctions.php';
                    include_once 'data/categorie.class.php';

                    $falbum=new AlbumFonc();
                    $fcateg=new Categorie();

                ?>
                <div class="form-group">
                    <label>Album</label>
                    <select name="album" class="form-control">
                        <?php foreach ($falbum->get_all_album_users($_SESSION['me']) as $album):?>
                            <option value="<?=$album['nom_album'];?>" class="form-control"><?=$album['nom_album'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Categorie</label>
                    <select name="categorie" class="form-control">
                        <?php foreach ($fcateg->get_all_categories() as $categorie):?>
                            <option value="<?=$categorie['nom_cat'];?>"><?=$categorie['nom_cat'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="titre" placeholder="Titre musique">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="duree" placeholder="duree">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <div class="wrap-input100 rs1 validate-input">
                    <input class="input100" type="text" name="studio" placeholder="Studio de production">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <label>Date de sortie</label>
                <div class="row">

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group" id="div_sous_categorie">
                            <label for="sous_categorie">jour</label>
                            <select  class="form-control" name="jour">
                                <?php for($i=1;$i<32;$i++):?>
                                    <option class="form-control"><?=$i;?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group" id="div_sous_categorie">
                            <label for="sous_categorie">mois</label>
                            <select class="form-control" name="mois">
                                <option value="janvier" class="form-control">janvier</option>
                                <option value="fevrier" class="form-control">fevrier</option>
                                <option value="mars" class="form-control">mars</option>
                                <option value="avril" class="form-control">avril</option>
                                <option value="mai" class="form-control">mai</option>
                                <option value="juin" class="form-control">juin</option>
                                <option value="juillet" class="form-control">juillet</option>
                                <option value="aout" class="form-control">aout</option>
                                <option value="septembre" class="form-control">septembre</option>
                                <option value="octobre" class="form-control">octobre</option>
                                <option value="novembre" class="form-control">novembre</option>
                                <option value="decembre" class="form-control">decembre</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group" id="div_sous_categorie">
                            <label for="sous_categorie">annee</label>
                            <select class="form-control" name="annee">
                                <?php $x=date('Y')-1900;?>
                                <?php for($i=0;$i<=$x;$i++):?>
                                    <option class="form-control"><?=1900+$i;?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                    </div>
                </div>

                <label>Chosir une image(logo de la chansons,facultatif)</label>
                <div class="wrap-input100 validate-input">

                    <input class="input100" type="file" name="image" formenctype="multipart/form-data" >
                </div>

                <label>fichier txt des paroles(facultatif a completer plus tard)</label>
                <div class="wrap-input100 validate-input">

                    <input class="input100" type="file" name="paroles" formenctype="multipart/form-data" >
                </div>

                <label>fichier audio musique (facultatif a completer plus tard)</label>
                <div class="wrap-input100 validate-input">

                    <input class="input100" type="file" name="audio" formenctype="multipart/form-data" >
                </div>


                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn">
                        Ajouter
                    </button>
                </div>
                <br><br>
                <div class="text-center">
						<span class="txt1">

						</span>

                    <a href="dashboard.php" class="txt2 hov1">
                        dashboard
                    </a>
                </div>


            </form>
        </div>
    </div>
</div>



<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>