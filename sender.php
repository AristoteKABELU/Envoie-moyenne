<?php

require 'vendor/autoload.php';

use App\Entity\Student;
use App\Helper\PreparatingMail;
use App\PHPMaillerStudent;
use App\Helper\TimeRunning;


$students = new Student();

$tableToQuery = 't_moyenne_sql';

#name of table in my_sql
$students = $students->getStudentsIdentities($tableToQuery);

#Exclude columns to display
$preparating = new PreparatingMail(array('NOM', 'PRENOM', 'POSTNOM', 'ID', 'G.', 'MATRICULE'));

#Title of mail
$subject = 'Moyenne SQL';



try{
    #PHPMaillerStudent($Host, $Username, $Password)
    $sendMail = new PHPMaillerStudent('smtp.gmail.com', '20kk090@esisalama.org', 'bypmqlclcfmtithc');
    $sendMail->settingSMTP();
    $sendMail->setFrom('20kk090@esisalama.org', 'Moyenne L3 AS');
    //$sendMail->addReplyTo('20kk090@esisalama.org');

    $start = TimeRunning::getTime();

    for ($idStudent=0; $idStudent < sizeof($students); $idStudent++) {

            #Creat table of one student
            $html = $preparating->toHTML($students[$idStudent], $students[$idStudent]);
            $mail = $preparating->toMail($students[$idStudent]->MATRICULE);

            #mail valide
            if ($mail) {
                $sendMail->addAddress($mail);
                $sendMail->Setcontent($subject, $html);
                //$sendMail->send();
                $sendMail->clearAddresses();
            }
            
    }

    $end = TimeRunning::getTime();
    $runningTime = TimeRunning::getTotalTime($start, $end);

    echo "Mails envoyé en {$runningTime}";

} catch(Exception $e) {
    echo "Erreur: Envoie {$sendMail->ErrorInfo}";
}
