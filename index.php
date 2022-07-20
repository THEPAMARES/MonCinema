<?php
// session_start();
define("URL",str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require "controllers/MovieController.controller.php";

$movieController = new moviesController();

try
{
    if (empty($_GET['page'])) 
    {
        require 'views/accueil.php';
    }
    else
    {
        $url = explode('/', filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) 
        {
            case "accueil" :
                require "views/accueil.php";
                break;

            case "films" :
                if (empty($url[1]))
                {
                    $movieController->afficherMovies();
                }
                else if ($url[1] === "modif")
                {
                    $movieController->modificationMovie($url[2]);
                }
                else if ($url[1] === "validajout")
                {
                    $movieController->ajoutMovieValidation();
                }
                else if ($url[1] === "validmodif")
                {
                    $movieController->modificationMovieValidation();
                }
                else if ($url[1] === "ajout")
                {
                    $movieController->ajoutMovie();
                }
                else if ($url[1] === "supprim"){
                    $movieController->suppressionMovie($url[2]);
                }else {
                    throw new Exception("La page n'existe pas");
                }

                break;
        }
    }
}

catch(Exception $e){
    $msg = $e->getMessage();
    require "views/error.php";
}