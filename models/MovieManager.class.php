<?php
require_once "Model.class.php";
require_once "Movie.class.php";

class MovieManager extends Model {

    private $movies;

    public function ajouterMovie($movie)
    {
        $this->movies[] = $movie;
    }

    public function getMovies()
    {
        return $this->movies;
    }

    // Affichage des films
    public function chargementMovies()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM movie ORDER BY id DESC");
        $req->execute();

        $movies = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($movies as $movie)
        {
            $m = new Movie($movie['id'], $movie['date_add'], $movie['title'], $movie['date_release'], $movie['summary'], $movie['poster']);
            $this->ajouterMovie($m);
        }

        return $movies;
    }

    // Renvoi le film par l'id
    public function getMovieById($id)
    {
        for($i=0; $i < count($this->movies); $i++)
        {
            if($this->movies[$i]->getId() === $id)
            {
                return $this->movies[$i];
            }
        }
        throw new Exception("Le film n'existe pas.");
    }

    // Methode ajout de Film
    public function ajoutMovieBdd($date_add, $title, $date_release, $summary, $poster)
    {
        $req = "INSERT INTO movie(date_add, title, date_release, summary, poster) VALUES (:date_add, :title, :date_release, :summary, :poster)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':date_add', $date_add, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':date_release', $date_release, PDO::PARAM_INT);
        $stmt->bindValue(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindValue(':poster', $poster, PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $movie = new Movie($this->getBdd()->lastInsertId(), $date_add, $title, $date_release, $summary, $poster);
            $this->ajouterMovie($movie);
        }
    }

    // Suppression d'un film
    public function suppressionMovieBdd($id){
        $req = "DELETE FROM movie WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $movie = $this->getMovieById($id);
            unset($movie);
        }
    }

    // Modification d'un film
    public function modificationMovieBdd($id, $title, $date_release, $summary, $poster){
        $req = "UPDATE movie SET title =:title, date_release =:date_release, summary =:summary, poster =:poster WHERE id =:id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':date_release', $date_release, PDO::PARAM_INT);
        $stmt->bindValue(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindValue(':poster', $poster, PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getMovieById($id)->setTitle($title);
            $this->getMovieById($id)->setDateRelease($date_release);
            $this->getMovieById($id)->setSummary($summary);
            $this->getMovieById($id)->setPoster($poster);
        }
    }
}