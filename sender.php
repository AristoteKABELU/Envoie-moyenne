<?php

require 'vendor/autoload.php';

use App\Entity\Student;
use App\Helper\PreparatingMail;
use App\PHPMaillerStudent;

$students = new Student();

$tableToQuery = 't_moyenne_sql';

#name of table in my_sql
$students = $students->getStudentsIdentities($tableToQuery);

#Exclude columns to display
$preparating = new PreparatingMail(['NOM', 'PRENOM', 'POSTNOM', 'ID', 'G.', 'MATRICULE']);

#Title of mail
$subject = 'Moyenne SQL';

try{
    $sendMail = new PHPMaillerStudent('smtp.gmail.com', '20kk090@esisalama.org', 'bypmqlclcfmtithc');
    $sendMail->settingSMTP();

    for ($idStudent=0; $idStudent < sizeof($students); $idStudent++) {

        if ($idStudent == 57 || $idStudent == 56) {

            $html = $preparating->toHTML($students[$idStudent], $students[$idStudent]);
            $mail = $preparating->toMail($students[$idStudent]->MATRICULE);

            if ($mail) {
                $sendMail->addAddress($mail);
                $sendMail->Setcontent($subject, $html);
                $sendMail->send();
                $sendMail->clearAddresses();
            }
        }

            
    }

    echo 'Mails envoyé !';

} catch(Exception $e) {
    echo "Erreur: Envoie {$sendMail->ErrorInfo}";
}
