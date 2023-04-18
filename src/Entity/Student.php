<?php

namespace App\Entity;

/*class Student
{
    protected $connexion;
    
    public function __construct(protected $matricule)
    {
        $this->connexion = new \PDO('mysql:host=localhost;dbname=moyenne_as', 'root', '');
    }

    public function getStudent()
    {
        $statement = $this->connexion->prepare('SELECT nom, postnom, prenom, matricule FROM t_moyenne WHERE matricule = ?');

        $statement->execute([$this->matricule]);
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}*/
class Student
{

    protected $connexion;
    
    public function __construct()
    {
        $this->connexion = new \PDO('mysql:host=localhost;dbname=moyenne_as', 'root', '');
    }

    public function getStudentsIdentities()
    {
        $statement = $this->connexion->prepare('SELECT nom, postnom, prenom, matricule 
                                                FROM t_moyenne');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}