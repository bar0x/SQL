<?php
/**
 * form Citta: visualizza il form inserimento Citta.
 * AddCitta - aggiunge un nuovo Citta,
 * listaCitta - visualizza la lista dei reparti disponibili,
 * deleteCitta - rimuove un Citta dalla lista.
 */
require("../include/head.php");
require("../include/funz.php");
scriviNavbar();

if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;

$location = "localhost";
$user = "root";
$password = "root";
$dbName = "scuola_2324";



switch($sc){
    case "formNuovaCitta":{
        echo("<br><div class=\"alert alert-dark\"><h3>Form inserimento Città <span class=\"badge badge-secondary\">v1.0</span> </h3></div>");
        echo("
        <h1><strong>Inserisci la nuova città qui</h1>
        <form action=\"citta.php\">
            <div class=\"mb-3\">
            <label for=\"nome\" class=\"form-label\">Nome:</label>
            <input type=\"text\" class=\"form-control\" id=\"nomeCitta\" name=\"nomeCitta\">
            <br>
            <input type=\"hidden\" name=\"scelta\" value=\"addNuovaCitta\">
            <button type=\"submit\" class=\"btn btn-primary\">Inserisci nuovo record</button>
        </form>

        ");
        break;
    }
    case "addNuovaCitta":{
        $nc = $_REQUEST['nomeCitta'];
    
        $sql = "INSERT INTO Citta(nomeCitta) VALUES('$nc');";
        $db = new mysqli($location,$user,$password,$dbName);

        if($db->query($sql)){
            echo("<div class=\"alert alert-success\">
                Record aggiunto...
            </div>");
        }
        else{
            echo("<div class=\"alert alert-warning\">
                Record non aggiunto, possibile mancanza dati o di permessi.
            </div>");
        }
        $db->close();
        break;
    }
    case "listaCitta":{
        $db = new mysqli($location,$user,$password,$dbName); // apro uno stream dati con il database -> mysql
        $sql = "SELECT * FROM citta";
        $resultSet = $db->query($sql);
        $db->close();


        echo("<table class=\"table table-striped\"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome citta</th>
                </tr>
            </thead>
        <tbody>");

        while($record = $resultSet->fetch_assoc()){
            echo("<tr>
                <th>".$record['id']."</th>
                <td>".$record['nomeCitta']."</td>
            ");
        }
        echo("</tbody> </table>");
        break;
    }
    case "deleteCitta":{
        break;
    }
}


require("../include/foot.php");
?>