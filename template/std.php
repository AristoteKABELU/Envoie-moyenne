<?php

use App\Entity\Student;
use App\src\Evaluation;

require('../src/Entity/Student.php');
require('../src/Entity/Evaluation.php');

$student = new Evaluation("20kk090");
//var_dump($student->getStudent());
//var_dump($student->getEvaluation());

$identity = $student->getStudent();
$evaluations = $student->getEvaluation();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p> bonjour <?= $identity[0]->nom.' '.$identity[0]->postnom.' '.$identity[0]->prenom ?></p>
    <?php foreach($evaluations as $evaluation) : ?>
        <table border="1px">
            <?php foreach($evaluation as $key => $element): ?>
            <tr>
                <td><?=$key?></td>
                <td><?= $element?></td>
            </tr>
            <?php endforeach;?>
        </table>
    <?php endforeach; ?>       
</body>
</html>