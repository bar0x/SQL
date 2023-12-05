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

$location = "";
$user = "";
$password = "";
$dbName = "";


//titolo
echo("<br><div class=\"alert alert-dark\"><h3>Form inserimento Città <span class=\"badge badge-secondary\">v1.0</span> </h3></div>");

//form inserimento con effetto collapse
echo("
<h1><strong>Inserisci la nuova città qui</h1>
<form action=\"citta.php\">
<div class=\"mb-3\">
<label for=\"nome\" class=\"form-label\">Nome:</label>
<input type=\"text\" class=\"form-control\" id=\"nome\" name=\"nome\">
<br>
<input type=\"hidden\" name=\"scelta\" value=\"addRecord\">
<button type=\"submit\" class=\"btn btn-primary\">Inserisci nuovo record</button>
</form>

");


// se $sc testata all'inizio della pagina è diversa da null e vale "addRecord" allora recupero le altre variabili dalla HTTP Request.
// poi eseguo la query di inserimento del nuovo record.
if($sc == "addRecord"){
    $n = $_REQUEST['nomeCitta'];
    
    $sql = "INSERT INTO Citta(nome) VALUES('$n');";
    $db = new mysqli($location,$user,$password,$tabName);

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
}


require("../include/foot.php");
?>