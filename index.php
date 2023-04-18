<?php

require 'vendor/autoload.php';

use App\Entity\Evaluation;
use App\Helper\PreparatingMail;
use App\PHPMaillerStudent;

$students = new Evaluation();
$listStudentsIdentities['identity'] = $students->getStudentsIdentities();
$listStudentsIdentities['evaluation'] = $students->getStudentsEvaluations();

//$listIndice = [32, 29, 39, 14, 24, 23, 163];

//$listIndice = [46, 58, 57, 32];

try{
    $sendMail = new PHPMaillerStudent('smtp.gmail.com', 'Aristotekabeluson@gmail.com', 'adrhlnwbbfusukhf');
    $sendMail->settingSMTP();

    /* for ($i=0; $i < sizeof($listStudentsIdentities['identity']); $i++) {

        $html = PreparatingMail::toHTML($listStudentsIdentities['identity'][$i], $listStudentsIdentities['evaluation'][$i]);
        $mail = PreparatingMail::toMail($listStudentsIdentities['identity'][$i]->matricule);
        
        if ($mail) {
            $sendMail->addMail($mail)
                ->Setcontent('Moyenne AS', $html);
            echo $html;
        }     
    } */

    foreach ($listIndice as $i) {
        $html = PreparatingMail::toHTML($listStudentsIdentities['identity'][$i], $listStudentsIdentities['evaluation'][$i]);
        $mail = PreparatingMail::toMail($listStudentsIdentities['identity'][$i]->matricule);
        
        if ($mail) {
            $sendMail->addMail($mail)
                ->Setcontent('Moyenne AS', $html)->sendMail();

        } 
    }
    
    echo 'Mails envoyé !';

} catch(Exception $e) {
    echo "Erreur: Envoie {$sendMail->getError()}";
}
