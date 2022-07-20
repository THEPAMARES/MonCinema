<?php

// Création d'une classe abstract (qui ne peut être instancié) class Model pour acceder à la base de données 

abstract class Model{

    private static $pdo;

    // Création d'une methode pour se connecter à la base de données

    private static function setBdd(){
        self::$pdo = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8mb4','root','');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Création d'une méthode qui retourne pdo

    public function getBdd(){

        if(self::$pdo === null){

            self::setBdd();
        }
        return self::$pdo;
    }
}