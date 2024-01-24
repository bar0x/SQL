<?php
$location = "localhost";
$user = "root";
$password = "root";
$dbName = "prova";



require("include/head.php");

if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;
if(isset($_REQUEST['stato'])) $st = $_REQUEST['stato']; else $st = null;





switch($sc){
    case "addrecord":{
        
        $sql = "INSERT INTO Stato(stato) VALUES('$st');";
        $db = new mysqli($location,$user,$password,$dbName);
        $db->query($sql);
        /*
        if($db->query($sql)){
            echo("<div class=\"alert alert-success\">
                Record aggiunto...
            </div>");
        }
        else{
            echo("<div class=\"alert alert-warning\">
                Record non aggiunto, possibile mancanza dati o di permessi.
            </div>");
        }*/
        echo("ok");
        $db->close();
        break;
    }

    case "manual":{
        echo("<br><div class=\"alert alert-dark\"><h3>Form inserimento Record <span class=\"badge badge-secondary\">v1.0</span> </h3></div>");
        echo("
        <h1><strong>Inserisci il nuovo record qui</h1>
        <form action=\"ISiDE_web.php\">
            <div class=\"mb-3\">
            <label for=\"nome\" class=\"form-label\">Stato:</label>
            <input type=\"text\" class=\"form-control\" id=\"stato\" name=\"stato\">
            <br>
            <input type=\"hidden\" name=\"scelta\" value=\"addrecord\">
            <button type=\"submit\" class=\"btn btn-primary\">Inserisci nuovo record</button>
            </div>
        </form>
        ");
        break;
    }
}



require("include/foot.php");
?>