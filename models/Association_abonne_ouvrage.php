<?php

class association_abonne_ouvrage extends Db {

    protected $id;
    protected $id_abonne;
    protected $id_ouvrage;

    const TABLE_NAME = "association_abonne_ouvrage";
    
    public function __construct($id_abonne, $id_ouvrage, $id = null)
    {
        $this->setIdAbonne($id_abonne);
        $this->setIdOuvrage($id_ouvrage);
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
     * Get the value of id_abonne
     */ 
    public function id_abonne()
    {
        return $this->id_abonne;
    }

    /**
     * Get the value of id_ouvrage
     */ 
    public function id_ouvrage()
    {
        return $this->id_ouvrage;
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
     * Set the value of id_abonne
     *
     * @return  self
     */ 
    public function setId_abonne($id_abonne)
    {
        $this->id_abonne = $id_abonne;

        return $this;
    }

    /**
     * Set the value of id_ouvrage
     *
     * @return  self
     */ 
    public function setId_ouvrage($id_ouvrage)
    {
        $this->id_ouvrage = $id_ouvrage;

        return $this;
    }


}
