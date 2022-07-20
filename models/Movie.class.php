<?php

class Movie {

    // Création des attributs/propriétés
    private $_id;
    private $_date_add;
    private $_title;
    private $_date_release;
    private $_summary;
    private $_poster;


    // Methode construct

    public function __construct($id, $date_add, $title, $date_release, $summary, $poster)
    {
        $this->setId($id);
        $this->setDateAdd($date_add);
        $this->setTitle($title);
        $this->setDateRelease($date_release);
        $this->setSummary($summary);
        $this->setPoster($poster);

    }
    // Création des getters

    public function getId() 
    {
        return $this->_id;
    }
    public function getDateAdd() 
    {
        return $this->_date_add;
    }
    public function getTitle() 
    {
        return $this->_title;
    }
    public function getDateRelease() 
    {
        return $this->_date_release;
    }
    public function getSummary() 
    {
        return $this->_summary;
    }
    public function getPoster() 
    {
        return $this->_poster;
    }

    // Création des setters
    public function setId($id) 
    {
        $this->_id = $id;
    }
    public function setDateAdd($date_add) 
    {
        $this->_date_add = $date_add;
    }
    public function setTitle($title) 
    {
        $this->_title = $title;
    }
    public function setDateRelease($date_release) 
    {
        $this->_date_release = $date_release;
    }
    public function setSummary($summary) 
    {
        $this->_summary = $summary;
    }
    public function setPoster($poster) 
    {
        $this->_poster = $poster;
    }

}