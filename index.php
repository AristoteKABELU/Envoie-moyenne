<?php

require 'vendor/autoload.php';

use App\Entity\Evaluation;
use App\Helper\PreparatingMail;
use App\PHPMaillerStudent;

$students = new Evaluation();
$listStudentsIdentities['identity'] = $students->getStudentsIdentities();
$listStudentsIdentities['evaluation'] = $students->getStudentsEvaluations();

//$listIndice = [32, 29, 39, 14, 24, 23, 163];

$listIndice = [];

try{
    $sendMail = new PHPMaillerStudent('smtp.gmail.com', 'Aristotekabeluson@gmail.com', 'adrhlnwbbfusukhf');
    $sendMail->settingSMTP();


    //Boucle qui envoie a tout les etudiants
    /* for ($i=0; $i < sizeof($listStudentsIdentities['identity']); $i++) {

        $html = PreparatingMail::toHTML($listStudentsIdentities['identity'][$i], $listStudentsIdentities['evaluation'][$i]);
        $mail = PreparatingMail::toMail($listStudentsIdentities['identity'][$i]->matricule);
        
        if ($mail) {
            $sendMail->addAddress($mail);
            $sendMail->Setcontent('L3 AS Moyenne', $html);
            $sendMail->send();
            $sendMail->clearAddresses();
        }     
    } */


    //Boucle d'essaie sur une liste limité des personnes!
    foreach ($listIndice as $i) {
        $html = PreparatingMail::toHTML($listStudentsIdentities['identity'][$i], $listStudentsIdentities['evaluation'][$i]);
        $mail = PreparatingMail::toMail($listStudentsIdentities['identity'][$i]->matricule);
        
        echo $html;

        if ($mail) {
            $sendMail->addAddress($mail);
            $sendMail->Setcontent('Moyenne AS', $html);
            $sendMail->send();
            $sendMail->clearAddresses();
        }
    }

    echo 'Mails envoyé !';

} catch(Exception $e) {
    echo "Erreur: Envoie {$sendMail->ErrorInfo}";
}
