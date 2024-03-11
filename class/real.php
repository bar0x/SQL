<?php
date_default_timezone_set('Europe/Rome');
$script_tz = date_default_timezone_get();

$day = date("l");
$time = date("Hi"); // time: hour+mins (es 11:45 = 1145)
$hour = date("H");
$min = date("i");


switch ($day){
    case 'Monday':{ //lunedì
        if ($time >= 0 && $time <= 803) echo("prima ora: Lab info 1");
        if ($time >= 804 && $time <= 903) echo("seconda ora: aula 45");
        if ($time >= 904 && $time <= 1007) echo("terza ora: aula 38");
        if ($time >= 1008 && $time <= 1103) echo("quarta ora: aula 49");
        if ($time >= 1104 && $time <= 1207) echo("quinta ora: aula 49");
        if ($time >= 1208 && $time <= 1307) echo("sesta ora: Lab info 2");
        else if ($time >= 1308) echo ("Overtime");
        return;
    }
    case 'Tuesday':{ //martedì
        if ($time >= 0 && $time < 803) echo("prima ora: Lab info 1");
        if ($time >= 804 && $time <= 903) echo("seconda ora: aula 49");
        if ($time >= 904 && $time <= 1007) echo("terza ora: aula 45");
        if ($time >= 1008 && $time <= 1103) echo("quarta ora: aula 45");
        if ($time >= 1104 && $time <= 1207) echo("quinta ora: aula 45");
        if ($time >= 1208 && $time <= 1307) echo("sesta ora: aula 38");
        else if ($time >= 1308) echo ("Overtime");
        return;
    }
    case 'Wednesday':{ //mercoledì con pomerigg
        if ($time >= 0 && $time < 803) echo("prima ora: Lab info 1");
        if ($time >= 804 && $time <= 903) echo("seconda ora: aula 49");
        if ($time >= 904 && $time <= 1007) echo("terza ora: aula 45");
        if ($time >= 1008 && $time <= 1103) echo("quarta ora: aula 45");
        if ($time >= 1104 && $time <= 1207) echo("quinta ora: aula 45");
        if ($time >= 1208 && $time <= 1307) echo("sesta ora: aula 38");
        //condizione che racchiude entrambe le ore del pomeriggio
        if ($time >= 1308 && $time <= 1420) echo("settima ora: Lab info 1");
        else if ($time >= 1421) echo ("Overtime");
        return;
    }
    case 'Thursday':{ //giovedì
        if ($time >= 0 && $time < 803) echo("prima ora: Lab info 1");
        if ($time >= 804 && $time <= 903) echo("seconda ora: Lab info 1");
        if ($time >= 904 && $time <= 1007) echo("terza ora: aula 45");
        if ($time >= 1008 && $time <= 1103) echo("quarta ora: aula 45");
        if ($time >= 1104 && $time <= 1207) echo("quinta ora: Lab info 1");
        if ($time >= 1208 && $time <= 1307) echo("sesta ora: Lab info 1");
        else if ($time >= 1308) echo ("Overtime");
        return;
    }
    case 'Friday':{ //venerdì
        if ($time >= 0 && $time < 803) echo("prima ora: Palestra");
        if ($time >= 804 && $time <= 903) echo("seconda ora: Palestra");
        if ($time >= 904 && $time <= 1007) echo("terza ora: aula 44");
        if ($time >= 1008 && $time <= 1103) echo("quarta ora: aula 51");
        if ($time >= 1104 && $time <= 1207) echo("quinta ora: aula 49");
        if ($time >= 1208 && $time <= 1307) echo("sesta ora: aula 51");
        else if ($time >= 1308) echo ("Overtime");
        return;
    }
}