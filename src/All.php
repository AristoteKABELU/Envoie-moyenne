<?php

namespace App\src;

use App\Entity\Student;
use App\Entity\Evaluation;

require('../src/Entity/Student.php');
require('../src/Entity/Evaluation.php');

//Instaciation of class [Evaluation]
$student = new Evaluation();

$listStudents['student'] = $student->getStudent();
$listStudents['evaluation'] = $student->getEvaluation();;



function toHTML($student, $evaluation) 
{
    $tableau =
<<<HTML
    <p> Bonjour  {$student->nom} {$student->postnom} {$student->prenom} </p>
    <table border='1px'>
HTML;

   foreach ($evaluation as $key => $element) {
    $tableau.=
<<<HTML
    <tr>
        <td>{$key}</td>
        <td>{$element}</td>
    </tr>
HTML;
   }
    return $tableau."</table>";
}


function displayTableStudent($listStudents) 
{
    for ($i=0; $i < sizeof($listStudents['student']); $i++) {
        echo toHTML($listStudents['student'][$i], $listStudents['evaluation'][$i]);
    }
}

//echo toHTML($listStudents['student'][32], $listStudents['evaluation'][32])

?>