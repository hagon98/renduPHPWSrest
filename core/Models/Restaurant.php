<?php

namespace Models;

class Restaurant extends AbstractModel implements \JsonSerializable
{

    protected string $nomDeLaTable = "restaurant";

    private $id;
    private $nom;
    private $adresse;
    private $ville;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }


    public function save(Restaurant $restaurant)
    {

        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (nom, adresse, ville) VALUE (:nom, :adresse, :ville)");

        $sql->execute([
            "nom" => $restaurant->nom,
            "adresse" => $restaurant->adresse,
            "ville" => $restaurant->ville
        ]);
    }

    public function getPlats()
    {
        $modelPlat = new \Models\Plat();
        return $modelPlat->findAllByRestau($this);
    }

    public function jsonSerialize()
    {
        return [
            "nom" => $this->nom,
            "adresse" => $this->adresse,
            "ville" => $this->ville,
            "id" => $this->id,
            "plats" => $this->getPlats()
        ];
    }
}
