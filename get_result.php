<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resultat recherche</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 54px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }

    </style>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">243lyrics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Acceuil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <!-- Heading Row -->

    <!-- /.row -->

    <?php

        include_once 'data/recherche.php';
        $rech=new Recherche();
        $tab=array();
        if(isset($_POST['clef_key']) && !empty($_POST['clef_key']) && empty($_POST['categorie']) && empty($_POST['annee']))
        {
            $tab=$rech->recherche_with_key($_POST['clef_key']);
        }
        if(isset($_POST['categorie']) && !empty($_POST['categorie']) && empty($_POST['annee']) && empty($_POST['clef_key']))
        {
            $tab=$rech->recherche_with_categorie($_POST['categorie']);
        }
        if(!empty($_POST['clef_key']) && !empty($_POST['categorie']) && !empty($_POST['annee']))
        {
            $tab=$rech->recherche_with_key_categ_year($_POST['clef_key'],$_POST['categorie'],$_POST['annee']);
        }
    ;?>
    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-4 text-center">
        <div class="card-body">
            <p class="text-white m-0"><?=count($tab);?> resultat(s) pour le mot: <?=$_POST['clef_key'];?></p>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- /.col-md-4 -->
         <?php foreach ($tab as $t):?>
        <!-- /.col-md-4 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title"><?=$t['titre'];?></h2>
                        <p class="card-text"><strong>Extrait:</strong><br><?=substr($t['paroles'],1,200);?>...</p>
                    </div>
                    <div class="card-footer">
                        <a href="info_sings.php?tags=<?= $t['id_mus'];?>" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        <!-- /.col-md-4 -->
        <?php endforeach;?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; #nsc243 <?=date('Y');?></p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
