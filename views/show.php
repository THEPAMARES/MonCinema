
<?php
include_once 'inc/head.inc.php';
include_once 'inc/header.inc.php';
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');

?>



<div class="container p-5">

    <div class="card mb-3">

        <h3 class="card-header">Titre du film</h3>

            <div class="card-body">
                <h5 class="card-title"><?php strftime("%A %d %B %Y."); ?>Date de sortie</h5>
            </div>

            <div class="col-8 mx-auto text-center">
                <img src="../assets/images/0378531.webp" alt="" width="100%">
            </div>

            <div class="card-body">
                <p class="card-text">Résumé du film</p>
            </div>


            <div class="card-body">
                <a href=javascript:history.go(-1)>Retour</a>
                <!-- <a href="#" class="card-link" >Retour</a> -->
            </div>

    </div>
    
</div>


<?php
include_once 'inc/footer.inc.php';
?>
