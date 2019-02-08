<?php

class Abonne extends Db {

    protected $id;
    protected $prenom;
    protected $nom;

    const TABLE_NAME = "Abonne";

    public function __construct($prenom, $nom, $id = null)
    {
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setId($id);
    }

    /**
     * Get the value of id
     */ 
    public function id()
    {
        return $this->id;
    }
   
    /**
     * Get the value of prenom
     */ 
    public function prenom()
    {
        return $this->prenom;
    }
  
    /**
     * Get the value of nom
     */ 
    public function nom()
    {
        return $this->nom;
    }


    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}