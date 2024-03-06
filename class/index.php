<?php
date_default_timezone_set('Europe/Rome');
$script_tz = date_default_timezone_get();


//echo date('D', strtotime($date));
$date = date('l');
$time = time();
$hour = date("H");
$min = date("i");

echo("Data:");
echo($date);
echo("<br>");

echo("Ora:");
echo($hour);
echo("<br>");

echo("Minuti:");
echo($min);
echo("<br>");

switch ($date){
    case 'Monday':{
        if (($hour >= 14 && $min > 02) || ($hour < 8 && $min < 03)) echo("1a ora: aula 43");
        if ($hour == 8 && $hour == 9) echo("2a ora: aula 45");
        if ($hour == 9 ) echo("1a ora: aula 43");
        if ($hour >= 14) echo("1a ora: aula 43");
        if ($hour >= 14) echo("1a ora: aula 43");
        if ($hour >= 14) echo("1a ora: aula 43");
        return;
    }case 'Tuesday':{
        echo("ciao");
        return;
    }case 'Wednesday':{
        if ( ($hour >= 14 && $min >= 3) || ($hour >= 15 && $min < 23)) 
        echo("16a ora: vai a casa <3");
        

        /*
        if($min>= 3 && $min <=)
        */
        return;
    }case 'Thursday':{
        if ( $hour < 8 || ($hour == 8 && $min <= 3)) 
        echo("1a ora: aula 43");
        if ( ($hour == 8 && $min <= 3) || ($hour == 9 && $min < 3)) 
        echo("1a ora: aula 43");
        if ( ($hour == 9 && $min <= 3) || ($hour == 10 && $min < 7)) 
        echo("2a ora: aula 43");
        if ( ($hour == 10 && $min <= 7) || ($hour == 11 && $min < 3)) 
        echo("3a ora: aula 45");
        echo("ciao");
        return;
    }
    case 'Friday':{
        echo("ciao");
        return;
    }
}