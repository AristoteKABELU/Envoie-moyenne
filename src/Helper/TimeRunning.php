<?php 

namespace App\Helper;

class TimeRunning
{
    

    public static function getTime()
    {
        $mtime  = microtime();
        $mtime = explode(" ", $mtime);
        $mtime = $mtime[1] + $mtime[0];

        return $mtime;
    }

    public static function getTotalTime($start, $end)
    {
        $totalTime = $end - $start;

        return number_format($totalTime, 4, ',', '').' s';
    }
    
}