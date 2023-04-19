<?php

require 'vendor/autoload.php';

use App\Entity\Student;
use App\Helper\PreparatingMail;
use App\PHPMaillerStudent;

$students = new Student();
$students = $students->getStudentsIdentities('t_moyenne_sql');

$listIndice = [57, 29];

try{
    $sendMail = new PHPMaillerStudent('smtp.gmail.com', '20kk090@esisalama.org', 'bypmqlclcfmtithc');
    $sendMail->settingSMTP();


    //Boucle qui envoie a tout les etudiants
   /*  for ($i=0; $i < sizeof($listStudentsIdentities['identity']); $i++) {

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
    foreach ($listIndice as $idStudent) {
        
        $preparating = new PreparatingMail(['NOM', 'PRENOM', 'POSTNOM', 'ID', 'GENRE', 'MATRICULE']);
        $html = $preparating->toHTML($students[$idStudent], $students[$idStudent]);
        $mail = $preparating->toMail($students[$idStudent]->MATRICULE);

        if ($mail) {
            $sendMail->addAddress($mail);
            $sendMail->Setcontent('Moyenne Physique Prepa 2021', $html);
            $sendMail->send();
            $sendMail->clearAddresses();
        }
    }

    echo 'Mails envoyé !';

} catch(Exception $e) {
    echo "Erreur: Envoie {$sendMail->ErrorInfo}";
}
