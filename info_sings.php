<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Details information chanson</title>

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

        .pagination {
            margin-bottom: 15px;
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

<?php
    include_once 'data/recherche.php';
    $rech=new Recherche();
    $tab=$rech->get_infomation_musique_by_id($_GET['tags']);
?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">
        <small>Titre:<?=$tab['titre']?></small>
    </h1>



    <!-- Project One -->
    <div class="row">
        <div class="col-md-7">
            <a href="#">
                <img class="img-fluid rounded mb-3 mb-md-0" src="http://127.0.0.1/243lyrics/data_save/audio_preview/<?=$rech->get_image_sing($tab['id_mus']);?>" alt="">
            </a>
            <br>
            <br>
            <h3>Audio</h3>
            <br>
            <audio src="http://127.0.0.1/243lyrics/data_save/audio_songs/<?=$rech->get_image_song($tab['id_mus']);?>" controls></audio>
        </div>

        <div class="col-md-5">
            <h3>Paroles chanson<?=$tab['titre'];?> par ,<strong><?=$tab['nom_artiste'];?></strong></h3>
            <p style="text-align: justify;"><?=$tab['paroles'];?></p>
            <button class="btn btn-primary" >j'aime</button>
        </div>
    </div>
    <!-- /.row -->

    <hr>






    <!-- Pagination -->


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
