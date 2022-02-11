<?php

namespace Models;

class Plat extends AbstractModel implements \JsonSerializable
{

    protected string $nomDeLaTable = "plats";

    private $id;
    private $description;
    private $price;
    private $restaurantId;

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getRestaurantId()
    {
        return $this->restaurantId;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setRestaurantId($restaurantId)
    {
        $this->restaurantId = $restaurantId;
    }

    public function findAllByRestau(Restaurant $restaurant)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable}
            WHERE restaurant_id = :restaurantId
        ");

        $sql->execute([
            "restaurantId" => $restaurant->getId()
        ]);

        $plats = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $plats;
    }

    public function jsonSerialize()
    {
        return [
            "description" => $this->description,
            "price" => $this->price,
            "id" => $this->id
        ];
    }
}
