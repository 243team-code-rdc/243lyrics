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
            <form class="login100-form validate-form" method="post" action="info/complete_audio.php" enctype="multipart/form-data">
					<span class="login100-form-title p-b-33">
						Completer information musique
					</span>

                <?php
                include_once 'data/album.fonctions.php';
                include_once 'data/categorie.class.php';

                $falbum=new AlbumFonc();

                ?>

                <div class="form-group">
                    <label>Album</label>
                    <select name="album" class="form-control" id="categorie">
                        <?php foreach ($falbum->get_all_album_users($_SESSION['me']) as $album):?>
                            <option value="<?=$album['nom_album'];?>" class="form-control"><?=$album['nom_album'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>chanson</label>
                    <select class="form-control" name="chanson" id="sous_categorie">

                    </select>
                </div>

                <div class="wrap-input100 validate-input">
                    <label>Fichier audio</label>
                    <input class="input100" type="file" name="audio" formenctype="multipart/form-data" >
                </div>

                <div class="container-login100-form-btn m-t-20">
                    <button type="submit" class="login100-form-btn">
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
<script src="js/jquery.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->

<script>
    $(document).ready(function () {

        $("#categorie").change(function () {
            $.ajax({
                type:'post',
                url:'info/get_sings.php',
                data:{'categorie1':$('#categorie').val()
                },
                success:function (data) {

                    var x="";
                    $.each($.parseJSON(data), function(i, obj) {
                        x+="<option value"+"="+obj.id_mus+">"+obj.titre+"</option>";
                    });
                    $("#sous_categorie").html(x);
                    // $("#sous_categorie").append(data);
                    //$("#sous_categorie").refresh;
                    //$("#sous_categorie").html("<option value"+"="+data+">"+data+"</option>");

                }
            })
        })

    })
</script>
</body>
</html>