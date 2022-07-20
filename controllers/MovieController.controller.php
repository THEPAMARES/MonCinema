<?php

require_once "models/MovieManager.class.php";

class MoviesController
{
    private $_movieManager;

    public function __construct()
    {
        $this->_movieManager = new MovieManager();
        $this->_movieManager->chargementMovies();
    }

    // Methode pour afficher les films
    public function afficherMovies(){
        $movies = $this->_movieManager->getMovies();
        require 'index.php';
    }

    // Methode pour afficher un film
    public function afficherMovie($id){
        $movie = $this->_movieManager->getMovieById($id);
        require 'views/show.php';
    }

    // Methode pour diriger vers la page d'ajout de film
    public function ajoutMovie(){
        require 'views/add.php';
    }

    // Methode pour valider le formulaire d'ajout
    public function ajoutMovieValidation(){
        $this->_movieManager->ajoutMovieBdd($_POST['date-add'], $_POST['title'], $_POST['date_release'], $_POST['summary'], $_POST['poster']);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg"  => "Ajout réalisé"
        ];

        header('location:' . URL . 'movie');
    }

    // Methode pour supprimer un film
    public function suppressionMovie($id){
        $this->_movieManager->suppressionMovieBdd($id);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg"  => "suppression effectuée"
        ];

        header('location:' . URL . 'movie');
    }

    // Methode accès à la page modif film
    public function modificationMovie($id){
        $movie = $this->_movieManager->getMovieById($id);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg"  => "Modification réalisée"
        ];

        require 'views/change.php';
    }

    // Methode pour valider le formulaire de modif
    public function modificationMovieValidation(){
        $this->_movieManager->modificationMovieBdd($_POST['id'], $_POST['title'], $_POST['date_release'], $_POST['summary'], $_POST['poster']);
        header('location:' . URL . 'movie');
    }
}