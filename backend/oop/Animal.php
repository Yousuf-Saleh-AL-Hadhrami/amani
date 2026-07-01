<?php 

abstract class Animal 
{
    public string $name;


    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;

    }

    abstract public function makeSound();
    
    
}