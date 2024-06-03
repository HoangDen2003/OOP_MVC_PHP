<?php

class Patient
{
    private $id;
    private $name;
    private $gender;

    // constructor
    public function __construct($id, $name, $gender)
    {
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}
