<?php

namespace App\Entity;

use App\Entity\Student;
use \PDO;
/*
class Evaluation extends Student
{
    public function getEvaluation()
    {
        $statement = $this->connexion
                    ->prepare('SELECT `int 1/26`,`td /5` ,`td /15` ,
                    `bon` ,`int` ,`int.3 /10` ,`bon /3` ,`bon /2`,`INT /7` ,`TDs /2` ,
                    `BON /1`,`Moyenne /10`
                    FROM t_moyenne WHERE matricule = ?' );

    $statement->execute([$this->matricule]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    
}*/
class Evaluation extends Student
{
    public function getStudentsEvaluations()
    {
        $statement = $this->connexion
                    ->prepare('SELECT `int 1/26`,`td /5` ,`td /15` ,
                    `bon` ,`int` ,`int.3 /10` ,`bon /3` ,`bon /2`,`INT /7` ,`TDs /2` ,
                    `BON /1`,`Moyenne /10`
                    FROM t_moyenne ' );

    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}