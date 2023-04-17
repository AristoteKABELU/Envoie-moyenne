<?php

class Query
{
    public $connexion;

    public function __construct()
    {
        $this->connexion =  new \PDO('mysql:host=localhost;dbname=moyenne_as;charset=utf8', 'root', '');
    }

    public function getStudents()
    {
        $statement = $this->connexion
                    ->prepare('SELECT 
                    nom, postnom, prenom, `int 1/26`,`td /5` ,`td /15` ,
                    `bon` ,`int` ,`int.3 /10` ,`bon /3` ,`bon /2`,`INT /7` ,`TDs /2` ,
                    `BON /1`,`Moyenne /10`
                    FROM t_moyenne');

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
        //echo '<pre>';var_dump( $statement->fetchAll(PDO::FETCH_OBJ)); echo'</pre>';
    }

    public function getStudent($student)
    {
        $statement = $this->connexion->prepare("SELECT 
        nom, postnom, prenom, `int 1/26`,`td /5` ,`td /15` ,
        `bon` ,`int` ,`int.3 /10` ,`bon /3` ,`bon /2`,`INT /7` ,`TDs /2` ,
        `BON /1`,`Moyenne /10`
        FROM t_moyenne WHERE matricule = ?");
        $statement->execute([$student]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}