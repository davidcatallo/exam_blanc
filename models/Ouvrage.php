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
    public function setTitre($titre){

        if (strlen($titre) == 0) {
            throw new Exception('Le titre ne peut pas être vide.');
        }
        if (strlen($titre) > 150) {
            throw new Exception('Le titre ne peut pas être supérieur à 150 caractères.');
        }

        $this->titre = $titre;

        return $this;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur){

        if (strlen($auteur) == 0) {
            throw new Exception("L'auteur ne peut pas être vide.");
        }
        if (strlen($auteur) > 150) {
            throw new Exception("L'auteur ne peut pas être supérieur à 150 caractères.");
        }

        $this->auteur = $auteur;

        return $this;
    }

    // les méthodes crud !

    public function save() {

        $data = [
            "titre"        => $this->titre(),
            "auteur"           => $this->auteur()
        ];

        if ($this->id() > 0) { 

            return $this->update();

        }

        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);

        return $this;

    }


    public function update() {

        if ($this->id > 0) {

            $data = [
                "titre"         => $this->titre(),
                "auteur"        => $this->auteur(),
                "id"            => $this->id()
            ];

            Db::dbUpdate(self::TABLE_NAME, $data);
            return $this;

        }

        return;

    }


    public function delete() {

        $data = [
            'id' => $this->id(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);

        return;
    }


    public static function findAll($objects = true) {

        $data = Db::dbFind(self::TABLE_NAME);
        
        if ($objects) {

            $objectsList = [];
            
            foreach ($data as $d) {
                $objectsList[] = new Ouvrage($d['titre'], $d['auteur'], intval($d['id']));
            }

            return $objectsList;
        }

        return $data;
    }


    public static function find(array $request, $objects = true) {

        $data = Db::dbFind(self::TABLE_NAME, $request);

        if ($objects) {
            $objectsList = [];

            foreach ($data as $d) {
                $objectsList[] = new Ouvrage($d['titre'], $d['auteur'], intval($d['id']));
            }
            return $objectsList;
        }
        return $data;
    }


    public static function findOne(int $id, $object = true) {

        $request = [
            ['id', '=', $id]
        ];

        $data = Db::dbFind(self::TABLE_NAME, $request);

        if (count($data) > 0) {
            
            $data = $data[0];
        
        }

        else return;

        if ($object) {
            $ouvrage = new Ouvrage($data['titre'], $data['auteur'], intval($data['id']));
            return $ouvrage;
        }
        return $data;
    }
 
}

