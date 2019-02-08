<?php

class Ouvrage extends Db {
    
    protected $id;
    protected $titre;
    protected $auteur;

    const TABLE_NAME = "ouvrage";
    
    public function __construct($titre, $auteur, $id = null)
    {
        $this->setTitre($titre);
        $this->setAuteur($auteur);
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
     * Get the value of titre
     */ 
    public function titre()
    {
        return $this->titre;
    }

    /**
     * Get the value of auteur
     */ 
    public function auteur()
    {
        return $this->auteur;
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
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }
}
