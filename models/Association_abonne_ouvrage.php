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
    public function setId($id){

        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of id_abonne
     *
     * @return  self
     */ 
    public function setIdAbonne($id_abonne){

        $this->id_abonne = $id_abonne;

        return $this;
    }

    /**
     * Set the value of id_ouvrage
     *
     * @return  self
     */ 
    public function setIdOuvrage($id_ouvrage){

        $this->id_ouvrage = $id_ouvrage;

        return $this;
    }

    public function save() {
        $data = [
            "id_abonne"     => $this->id_abonne(),
            "id_ouvrage"    => $this->id_ouvrage()
        ];
        if ($this->id > 0) return $this->update();
        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);
        $this->setId($nouvelId);
        return $this;
    }

    public function update() {
        if ($this->id > 0) {
            $data = [
                "id_abonne"     => $this->id_abonne(),
                "id_ouvrage"    => $this->id_ouvrage(),
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
                $objectsList[] = new association_abonne_ouvrage($d['id_abonne'], $d['id_ouvrage'], intval($d['id']));
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
                $objectsList[] = new association_abonne_ouvrage($d['id_abonne'], $d['id_ouvrage'], intval($d['id']));
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
        if (count($data) > 0) $data = $data[0];
        else return;
        if ($object) {
            $article = new association_abonne_ouvrage($data['id_abonne'], $data['id_ouvrage'], intval($data['id']));
            return $article;
        }
        return $data;
    }

}
