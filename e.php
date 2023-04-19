<?php

require 'vendor/autoload.php';

use App\Entity\Student;

$student = new Student();
$student = $student->getStudentsIdentities();


function columnsExclude(...$values) 
{
    $list = [];

    foreach ($values as $value) {
        array_push($list, $value);
    }

    return $list;
}

$listColumnExclude = columnsExclude('nom', 'prenom', 'postnom', 'id', 'genre', 'matricule');

echo $student[32]->nom.' '.$student[32]->postnom.' '.$student[32]->prenom.PHP_EOL;

foreach($student[32] as $key => $element) {

    if (!in_array($key, $listColumnExclude)) {
        echo $key.': '.$student[32]->$key.PHP_EOL;
    }

}







