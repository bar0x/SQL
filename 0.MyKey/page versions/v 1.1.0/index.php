<?php
/**
 * Il codice seguente si bassa sulla schematizzazione ER del file er01.drawio persente nella
 * cartella /UD 2 - mySQL Basics.
 * Il codice permette:
 * - Visualizza il form per l'inserimento di un nuovo record.
 * - Visualizza il contenuto della tabella Uomo nel database.
 * - Visualizza un messaggio di conferma di avvenuto inserimento record.
 */
$user = "root";
$password = "root";
if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;

require("head.php");

// costruisco il form bootstrap per l'inserimento dei dati di un nuovo record.
echo("<br><div class=\"alert alert-dark\"><h3>MyKey 1.0 DataBase form <span class=\"badge badge-secondary\">DUX EDITION</span> </h3></div>");


echo ("
    <h1><strong>Form inserimento</h1>
    <h3><small class=\"text-muted\">Crea un nuovo record qui</small>
    <br></h3> 
");



echo("<form action=\"index.php\">
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
        <input type=\"text\" class=\"form-control\" id=\"data_transazione\" name=\"data_transazione\" placeholder=\" notazione\">
    </div>
    <input type=\"hidden\" name=\"scelta\" value=\"addUomo\">
    <button type=\"submit\" class=\"btn btn-primary\">Inserisci nuovo record</button>
</form>");

// se $sc testata all'inizio della pagina è diversa da null e vale "addUomo" allora recupero le altre variabili dalla HTTP Request.
// poi eseguo la query di inserimento del nuovo record.
if($sc == "addUomo"){
    $n = $_REQUEST['nome'];
    $c = $_REQUEST['cognome'];
    $i = $_REQUEST['importo'];
    $d = $_REQUEST['data_transazione'];

    $sql = "INSERT INTO Ricarica(nome, cognome, importo, data_transazione)
            VALUES('$n','$c',$i,'$d');";

    $db = new mysqli("localhost",$user,$password,"mykey");

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
    <h3><small class=\"text-muted\">presenti nel database</small>
    <br> <br> <br> 
");


$db = new mysqli("localhost",$user,$password,"mykey"); // apro uno stream dati con il database -> mysql
$sql = "SELECT *        
    FROM ricarica";
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




echo("<hr class=\"mt-5 mb-5\">
    <h1><strong>Prospetto finale</h1>
    <h3><small class=\"text-muted\">Totale ricarica per persona</small>
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

printTotalFromName("Mattia", $user, $password);
printTotalFromName("Jacopo", $user, $password);
printTotalFromName("Davide", $user, $password);

echo("</tbody> </table>");
require("foot.php");

function printTotalFromName($fname, $_user, $_password) {
    //faccio la query
    $db = new mysqli("localhost",$_user,$_password,"mykey"); 
    $sql = "
    SELECT nome, sum(saldo), data_transazione
    FROM ricarica
    WHERE nome = '$fname'
    ";
    $resultSet = $db->query($sql);
    $db->close();

    //stampo i risultati
    $record = $resultSet->fetch_assoc();
    echo("<tr>
        <td>".$record['nome']."</td>
        <td>".$record['sum(saldo)']." €</td>
        <td>".$record['data_transazione']."</td>
    ");
}
?>