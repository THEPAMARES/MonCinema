<?php
    include_once 'inc/head.inc.php';
    include_once 'inc/header.inc.php';


    if(!empty($_SESSION['alert'])){

?>
    <div class="alert alert-dismissible alert-info<?=$_SESSION['alert']['type'] ?>" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $_SESSION['alert']['msg'] ?>
    </div>
<?php
    }

    unset($_SESSION['alert']);
    ob_start();
    
?>
<div class="container p-5">

    <div class="card border-secondary " style="max-width: 15rem;" >
        <div class="card-body" >
        <?php foreach($movies as $movie): ?>

            <a class= "liens" href="<?=URL?>show.php">
                <h4 class="card-title">
                    <?= $movies[$i]->getTitle(); ?>
                </h4>
                <img src="assets/images/0378531.webp" alt="" width="100%">
                <p class="card-text">
                    <?= $movies[$i]->getSummary(); ?>
                </p>
            </a>
        </div>
    </div>
</div>


<?php
endforeach;
$content = ob_get_clean();
require "index.php";
include_once 'inc/footer.inc.php';
