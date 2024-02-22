<?php
    require("../include/libGenerale.php");
    // eseguo il test sulle variabili che posso ricevere tramite HTTP-REQUEST
    if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;
    require("../include/head.php");
    scriviNavBar();
    echo('<div class="alert alert-primary">Siamo nella sezione Pagamenti - Ver 2.0</div>');
    
    switch($sc){
        case "formNuovoPagamento":{
            /* Visualizzo il form per l'inserimento di una nuova città, arrivo in questo case cliccando il link nella navBar generale nella sezione Città.*/
            echo('<form action=".php">
                <div class="mb-3">
                    <label for="data" class="form-label">Data:</label>
                    <input type="text" class="form-control" id="data" name="date" placeholder="Inserisci la data del pagamento">

                    <label for="causale" class="form-label">Causale del pagamento:</label>
                    <input type="text" class="form-control" id="causale" name="causale" placeholder="inserisci qui la causale">

                    <label for="pagamento" class="form-label">Importo del pagamento:</label>
                    <input type="text" class="form-control" id="pagamento" name="pagamento" placeholder="inserisci qui il pagamento">
                </div>
                <input type="hidden" name="scelta" value="addPagamento">
                <button type="submit" class="btn btn-primary">Inserisci nel Database</button>
            </form>');
            break;
        }
        case "addPagamento":{
            /* recupero il nome della città che l'utente vuole inserire dalle variabili nell'indirizzo URL generato quando si preme sul bottone "Inserisci" nel form
                creo quindi la stringa mySQL da eseguire per l'inserimento nel database e la eseguo */
            $n = $_REQUEST['nomeCitta'];
            $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
            $sql = "INSERT INTO citta (nomeCitta) VALUES('$n')";
            if($db->query($sql)){
                echo('<div class="alert alert-success">Pagamento '.$n.' inserita con successo</div>');
            }
            else{
                echo('<div class="alert alert-danger">Attenzione! Pagamento '.$n.' non caricata.</div>');
            }
            break;
        }
        case "listaPagamento":{
            /* Visualizzo tutte le città presenti nel database, questo case viene richiamato dal link presente nella navBar generale nella sezione Città */
            $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
            $sql = "SELECT * FROM citta";
            $rs = $db->query($sql);
            
            if($rs){
                echo('<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Città</th>
                            <th scope="col">Reparti Associati</th>
                            <th scope="col">Dipendenti Residenti</th>
                            <th scope="col">Gestione</th>
                        </tr>
                    </thead>
                ');
                echo('<tbody');
                while($record = $rs->fetch_assoc()){
                    echo('<tr>
                        <th scope="row">'.$record['id'].'</th>
                        <td>'.$record['nomeCitta'].'</td>');

                    // conteggio reparti nella città
                    $sql = "SELECT COUNT(reparto.id) AS recordTrovati FROM reparto WHERE idCittaReparto='".$record['id']."'";
                    $rs2 = $db->query($sql);
                    $record2 = $rs2->fetch_assoc();
                    echo('<td>'.$record2['recordTrovati'].'</td>');

                    // conteggio dipendenti residenti nella città
                    $sql = "SELECT COUNT(dipendente.id) AS recordTrovati FROM dipendente WHERE idCittaResidenza='".$record['id']."'";
                    $rs2 = $db->query($sql);
                    $record2 = $rs2->fetch_assoc();
                    echo('<td>'.$record2['recordTrovati'].'</td>');

                    echo('<td><a class="btn btn-danger" role="button" href="citta.php?scelta=deleteCitta&idCitta='.$record['id'].'">Cancella</a></td>
                        </tr>
                    ');
                }
                echo('</tbody>');
                echo('<caption>Lista città presenti a database');
                echo('</table>');
            }
            $db->close();
            break;
        }
        case "deleteCitta":{
            $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
            $idC = $_REQUEST['idCitta'];
            $dipendentiTrovati = 0;
            $repartiTrovati = 0;
            
            // Verifico se la città che intendo cancellare interessa 'Dipendenti'.
            $sql = "SELECT * FROM dipendente WHERE idCittaResidenza=$idC";
            $rs = $db->query($sql);
            $dipendentiTrovati = $rs->num_rows;

            // Verifico se la città che intendo cancellare interessa 'Reparti'.
            $sql = "SELECT * FROM reparto WHERE idCittaReparto=$idC";
            $rs = $db->query($sql);
            $repartiTrovati = $rs->num_rows;
            
            if(!$dipendentiTrovati && !$repartiTrovati){
                // se entrambi i contatori sono a zero allora posso cancellare direttamente la città dal DB.
                $sql = "DELETE FROM citta WHERE id=$idC";
                if($db->query($sql))
                    echo('<div class="alert alert-success">Citta cancellata con successo.</div>');
                else
                    echo('<div class="alert alert-warning">Problema in cancellazione.</div>');
                
            }
            else{
                // se uno dei due contatori è diverso da zero allora devo prima procedere allo svuotamento delle tabelle con idC come FK.
                echo('<div class="alert alert-warning">ATTENZIONE: Questa città interessa uno i più Dipendenti/Reparti<br />Procedere alla loro cancellazione quindi riprovare.</div>');
                //echo('<a class="btn btn-danger" role="button" href="citta.php?scelta=deleteAllCitta&idCitta='.$idC.'">Conferma cancellazione Città e relativi Dipendenti/Reparti associati.</a>');
            }
            $db->close();
            break;
        }
        default:{
            echo('<div class="alert alert-warning">Attenzione, scelta non valida.</div>');
            break;
        }
    }
    require("../include/foot.php");
?>