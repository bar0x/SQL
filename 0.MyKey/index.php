<?php
/** INFO UTILI:
 * -Autor: Mattia Baroni,
 * -Version: 1.2.0,
 * -bootstrapActualVersion: 5.3.2 (https://getbootstrap.com/docs/5.3/getting-started/introduction/),
*/

if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;

if(isset($_REQUEST['nome'])) $n = $_REQUEST['nome']; else $sc = null;
if(isset($_REQUEST['cognome'])) $c = $_REQUEST['cognome']; else $sc = null;
if(isset($_REQUEST['importo'])) $i = $_REQUEST['importo']; else $sc = null;
if(isset($_REQUEST['data_transazione'])) $d = $_REQUEST['data_transazione']; else $sc = null;


$location = "sql204.infinityfree.com";
$user = "if0_35420928";
$password = "6DFJf1O742jiN";
$dbName = "if0_35420928_baro";

require("head.php");
require("functions.php");
//titolo
echo("<br><div class=\"alert alert-dark\"><h3>cd key games 1.0 DataBase form <span class=\"badge badge-secondary\">NEW EDITION</span> </h3></div>");

//form inserimento con effetto collapse
echo("
<hr class=\"mt-5 mb-5\">
<h1><strong>Form inserimento</h1>

<button class=\"btn\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseExample\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
    <h3><small class=\"text-muted\">inserisci un record qui</small>
</button>

<div class=\"collapse\" id=\"collapseExample\">
    <form action=\"index.php\">
    <div class=\"mb-3\">
        <label for=\"nome\" class=\"form-label\">Nome:</label>
        <input type=\"text\" class=\"form-control\" id=\"nome\" name=\"nome\">
    </div>
    <div class=\"mb-3\">
        <label for=\"cognome\" class=\"form-label\">Cognome:</label>
        <input type=\"text\" class=\"form-control\" id=\"cognome\" name=\"cognome\">
    </div>
    <div class=\"mb-3\">
        <label for=\"importo\" class=\"form-label\">importo:</label>
        <input type=\"text\" class=\"form-control\" id=\"importo\" name=\"importo\">
    </div>
    <div class=\"mb-3\">
        <label for=\"data_transazione\" class=\"form-label\">Data:</label>
        <input type=\"text\" class=\"form-control\" id=\"data_transazione\" name=\"data_transazione\" placeholder=\" notazione AAAA-MM-GG\">
    </div>
    <input type=\"hidden\" name=\"scelta\" value=\"addRecord\">
    <button type=\"submit\" class=\"btn btn-primary\">Inserisci nuovo record</button>
    </form>
</div>
");


// se $sc testata all'inizio della pagina è diversa da null e vale "addRecord" allora recupero le altre variabili dalla HTTP Request.
// poi eseguo la query di inserimento del nuovo record.
if($sc == "addRecord"){
    $n = $_REQUEST['nome'];
    $c = $_REQUEST['cognome'];
    $i = $_REQUEST['importo'];
    $d = $_REQUEST['data_transazione'];

    $sql = "INSERT INTO ricarica(nome, cognome, importo, data_transazione) VALUES('$n','$c',$i,'$d');";
    $db = new mysqli($location,$user,$password,$tabName);

    if($db->query($sql)){
        echo("<div class=\"alert alert-success\">
            Record aggiunto...
        </div>");
    }
    else if ($db -> connect_errno) {
        echo ("<div class=\"alert alert-warning\"> Failed to connect to MySQL: </div> ");
        echo  $db->connect_error;
    }
    else{
        echo("<div class=\"alert alert-warning\">
            Record non aggiunto, possibile mancanza dati o di permessi.
        </div>");
    }

    $db->close();
}


echo ("
    <hr class=\"mt-5 mb-5\">
    <h1><strong>Storico Transazioni</h1>
    <h3><small class=\"text-muted\"> presenti nel database</small>
    <br> <br> <br> 
");


$db = new mysqli($location,$user,$password,$dbName); // apro uno stream dati con il database -> mysql
$sql = "SELECT * FROM ricarica";
$resultSet = $db->query($sql);
$db->close();


echo("<table class=\"table table-striped\"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Importo</th>
            <th>Data ricarica</th>
        </tr>
    </thead>
<tbody>");

while($record = $resultSet->fetch_assoc()){
    echo("<tr>
        <th>".$record['id']."</th>
        <td>".$record['nome']."</td>
        <td>".$record['cognome']."</td>
        <td>".$record['saldo']." € </td>
        <td>".$record['data_transazione']."</td>
    ");
}
echo("</tbody> </table>");


// print prospetto finale

echo("<hr class=\"mt-5 mb-5\">
    <h1><strong>Prospetto finale</h1>
    <h3><small class=\"text-muted\"> Totale ricarica per persona</small>
    <br> <br> <br>
");

echo("<table class=\"table table-striped\">  
    <thead>
        <tr>
            <th>Nome</th>
            <th>Importo totale</th>
            <th>Data</th>
        </tr>
    </thead> <tbody>
");
require("foot.php");
printTotalFromName("Mattia",$location, $user, $password, $dbName);
printTotalFromName("Jacopo",$location, $user, $password, $dbName);
printTotalFromName("Davide",$location, $user, $password, $dbName);

echo("</tbody> </table>");

?>