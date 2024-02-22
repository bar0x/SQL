<?php
/**
 * form reparto: visualizza il form inserimento reparto.
 * AddReparto - aggiunge un nuovo reparto,
 * listaReparto - visualizza la lista dei reparti disponibili,
 * deleteReparto - rimuove un reparto dalla lista.
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
    case "formNuovoReparto":{
        echo("<br><div class=\"alert alert-dark\"><h3>Form inserimento Reparto <span class=\"badge badge-secondary\">v1.0</span> </h3></div>");
        echo("
        <h1><strong>Inserisci il nuovo reparto qui</h1>
        <form action=\"citta.php\">
            <div class=\"mb-3\">
            <label for=\"nome\" class=\"form-label\">Nome reparto:</label>
            <input type=\"text\" class=\"form-control\" id=\"nomeReparto\" name=\"nomeReparto\">
            <label for=\"nome\" class=\"form-label\">Id città:</label>
            <input type=\"text\" class=\"form-control\" id=\"idCitta\" name=\"idCitta\">
            <br>
            <input type=\"hidden\" name=\"scelta\" value=\"addNuovoReparto\">
            <button type=\"submit\" class=\"btn btn-primary\">Inserisci nuovo record</button>
            </div>
        </form>

        ");
        break;
    }
    case "addNuovoReparto":{
        $nr = $_REQUEST['nomeReparto'];
        $ic = $_REQUEST['idCitta'];
    

        $sql = "INSERT INTO Reparti(nomeReparto, idCitta) VALUES('$nr','$ic');";
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
    case "listaReparti":{
        echo("<br><div class=\"alert alert-dark\"><h3>Listaggio reparti presenti nel DataBase <span class=\"badge badge-secondary\">v1.0</span> </h3></div>");
        
        $db = new mysqli($location,$user,$password,$dbName); // apro uno stream dati con il database -> mysql
        $sql = "SELECT * FROM reparto";
        $resultSet = $db->query($sql);
        $db->close();


        echo("<table class=\"table table-striped\"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome reparto</th>
                    <th>ID Città</th>
                    <th>Gestione</th>
                </tr>
            </thead>
        <tbody>");

        while($record = $resultSet->fetch_assoc()){
            echo("<tr>
                <th>".$record['id']."</th>
                <td>".$record['nomeReparto']."</td>
                <td>".$record['idCittaReparto']."</td>
                <td><a class="btn btn-danger" role="button" href="reparto.php?scelta=deleteReparto&idCittaReparto='.$record['id'].'">Cancella</a></td>
            ");
        }
        echo("</tbody> </table>");
        break;
    }
    case "deleteReparto":{
        break;
    }
}
require("../include/foot.php");

/* 

case "formNuovoReparto":{
            echo('<form action="reparto.php">
                <div class="mb-3">
                    <label for="nomeReparto" class="form-label">Nome Reparto:</label>
                    <input type="text" class="form-control" id="nomeReparto" name="nomeReparto" placeholder="Inserisci il nome di un reparto">
                </div>');
                
                $db = new mysqli("localhost", "root", "", "scuola2324");
                $sql = "SELECT * FROM Citta";
                $rs = $db->query($sql);
                $db->close();

                echo('<div class="mb-3">
                    <label for="idCitta" class="form-label">Città del reparto:</label>
                    <select class="form-select" id="idCitta" name="idCitta" aria-label="Default select example">');
                    while($record = $rs->fetch_assoc()){
                        echo('<option value="'.$record['id'].'">'.$record['nomeCitta'].'</option>');
                    }
                echo('</select>
                </div>');
            echo('
                <input type="hidden" name="scelta" value="addNuovoReparto">
                <button type="submit" class="btn btn-primary">Inserisci nel Database</button>
            </form>');
            break;
        }
*/

?>