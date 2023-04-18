<?php

namespace App\Helper;

class PreparatingMail 
{

    public static function toHTML($student, $evaluation) 
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
}