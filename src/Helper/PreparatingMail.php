<?php

namespace App\Helper;

class PreparatingMail 
{
    public function __construct(private array $listColumnExclude)
    {
        
    }

    public  function toHTML($student, $evaluation) 
    {
    $tableau =
<<<HTML
    <p> Bonjour  <strong> {$student->NOM} {$student->POSTNOM} {$student->PRENOM} </strong>.</p><br>

    <table border='1'>
HTML;

   foreach ($evaluation as $key => $element) {

    if (!in_array($key, $this->listColumnExclude)) {
        $element = $element??'';
        $tableau.=
<<<HTML
    <tr>
        <td>{$key}</td>
        <td>{$student->$key}</td>
    </tr>
HTML;
    } 

}
    return $tableau."</table>";
    }  

    public function toMail(string $matricule){
        if (!empty($matricule)) {
            $matricule.='@esisalama.org';
            
            return $matricule;
        }
        return null;
    }
    
}