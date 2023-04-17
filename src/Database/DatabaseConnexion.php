<?php

namespace App\src;

class DatabaseConnexion
{
    private $connexion;
    
    public function __construct()
    {
        $this->connexion = new \PDO('mysql:host=localhost;dbname=moyenne_as', 'root', '');
    }
}
