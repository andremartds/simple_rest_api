<?php

namespace App\Http\Models;

class Product
{
    private $id;
    private String $name;
    private String $description;
    private String $price;

    public function __construct($id = "", String $name, String $description, String $price)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(String $name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(String $description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice(String $price)
    {
        $this->price = $price;
    }
}
