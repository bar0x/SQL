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
        echo("<br><div class=\"alert alert-dark\"><h3>Listaggio città presenti nel DataBase <span class=\"badge badge-secondary\">v1.0</span> </h3></div>");
        
        $db = new mysqli($location,$user,$password,$dbName); // apro uno stream dati con il database -> mysql
        $sql = "SELECT * FROM reparti";
        $resultSet = $db->query($sql);
        $db->close();


        echo("<table class=\"table table-striped\"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome reparto</th>
                    <th>ID Città</th>
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
    case "deleteReparto":{
        break;
    }
}
require("../include/foot.php");
?>