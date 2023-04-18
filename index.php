<?php

require 'vendor/autoload.php';

use App\Entity\Evaluation;
use App\Helper\PreparatingMail;
use App\PHPMaillerStudent;

$students = new Evaluation();
$listStudentsIdentities['identity'] = $students->getStudentsIdentities();
$listStudentsIdentities['evaluation'] = $students->getStudentsEvaluations();

//echo PreparatingMail::toHTML($listStudentsIdentities['identity'][57], $listStudentsIdentities['evaluation'][57]);
//echo '<pre>';var_dump($listStudentsIdentities['identity'][32], $listStudentsIdentities['evaluation'][32]); echo '</pre>';

$sendMail = new PHPMaillerStudent('smtp.gmail.com', 'Aristotekabeluson@gmail.com', 'adrhlnwbbfusukhf');
$sendMail->settingSMTP();
$sendMail->addMail('20kk083@esisalama.org');
$sendMail->Setcontent('Moyenne AS',
                    PreparatingMail::toHTML($listStudentsIdentities['identity'][29], $listStudentsIdentities['evaluation'][29]));
$sendMail->sendMail();