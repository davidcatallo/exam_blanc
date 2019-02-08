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

    
    
    public function save() {

        $data = [
            "prenom"        => $this->prenom(),
            "nom"           => $this->nom()
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
                "prenom"        => $this->prenom(),
                "nom"           => $this->nom(),
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
                $objectsList[] = new Abonne($d['prenom'], $d['nom'], intval($d['id']));
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
                $objectsList[] = new Abonne($d['prenom'], $d['nom'], intval($d['id']));
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
            $abonne = new Abonne($data['prenom'], $data['nom'], intval($data['id']));
            return $abonne;
        }
        return $data;
    }
 
}