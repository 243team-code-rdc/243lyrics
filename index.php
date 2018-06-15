<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<style></style>
<!------ Include the above in your HEAD tag ---------->


<?php

include_once 'data/categorie.class.php';


$fcateg=new Categorie();

?>

<!-- Navigation -->


<div style="margin-top: 20px;margin-right: 20px;float: right;">
    <a href="login.php" class="btn btn-danger">Se connecter</a>
    <a href="sign.php" class="btn btn-danger">Creer un compte</a>
</div>

<div class="container" style="margin-bottom: 50px;">

    <div class="row" style="margin-top: 90px;">
    <form action="get_result.php" method="post">
        <div class="col-md-4 col-md-offset-4">
            <img src="images/casue.jpg" >
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>Categorie</label>
                    <select name="categorie" class="form-control">
                        <option></option>
                        <?php foreach ($fcateg->get_all_categories() as $categorie):?>
                            <option value="<?=$categorie['nom_cat'];?>"><?=$categorie['nom_cat'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group" id="div_sous_categorie">
                        <label for="sous_categorie">annee</label>
                        <select class="form-control" name="annee">
                            <option></option>
                            <?php $x=date('Y')-1900;?>
                            <?php for($i=0;$i<=$x;$i++):?>
                                <option class="form-control"><?=1900+$i;?></option>
                            <?php endfor;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" >
                <input class="form-control " placeholder="faire une recherche" name="clef_key" type="text">
            </div>

            <div class="col-md-4 col-md-offset-4">
                <input  class="btn  btn-danger btn-block" type="submit" value="recherche">
            </div>

        </div>

    </form>
    </div>
</div>

