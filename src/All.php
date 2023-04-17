<?php

namespace App\src;

use App\Entity\Student;
use App\src\Evaluation;

require('../src/Entity/Student.php');
require('../src/Entity/Evaluation.php');

$student = new Evaluation();
$identity = $student->getStudent();
$evaluations = $student->getEvaluation();

$lisTStudents['identity'] = $identity;
$lisTStudents['evaluations'] = $evaluations;



function toHTML($student, $evaluation) 
{
    $identity=
<<<HTML
    <p> Bonjour  {$student->nom} {$student->postnom} {$student->prenom}
HTML;

    $tableau =
<<<HTML
    <table border="1px">
HTML;

   $elements = '';
   foreach ($evaluation as $key => $element) {
    $elements.=
<<<HTML
    <tr>
        <td>{$key}</td>
        <td>{$element}</td>
    </tr>
    <br>
HTML;
   }

    return $identity.$tableau.$elements;

}

?>