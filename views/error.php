<?php
ob_start();

$msg;

$content = ob_get_clean();
$titre = "Erreur !!!";
require "accueil.php";