<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "verifica";

if(isset($_REQUEST['scelta'])) $sc = $_REQUEST['scelta']; else $sc = null;


//head
head();

scriviNavbar();








switch($sc){
    case "formNuovaCitta":{
        /* Visualizzo il form per l'inserimento di una nuova città, arrivo in questo case cliccando il link nella navBar generale nella sezione Città.*/
        echo('<form action="index.php">
            <div class="mb-3">
                <label for="nomeCitta" class="form-label">Nome Città:</label>
                <input type="text" class="form-control" id="nomeCitta" name="nomeCitta" placeholder="Inserisci il nome di una città">
            </div>
            <div class="mb-3">
                <label for="nomeProvincia" class="form-label">Nome Provincia:</label>
                <input type="text" class="form-control" id="nomeProvincia" name="nomeProvincia" placeholder="Inserisci il nome della provincia">
            </div>
            <input type="hidden" name="scelta" value="addNuovaCitta">
            <button type="submit" class="btn btn-primary">Inserisci nel Database</button>
        </form>');
        break;
    }
    case "addNuovaCitta":{
        /* recupero il nome della città che l'utente vuole inserire dalle variabili nell'indirizzo URL generato quando si preme sul bottone "Inserisci" nel form
            creo quindi la stringa mySQL da eseguire per l'inserimento nel database e la eseguo */
        $n = $_REQUEST['nome'];
        $p = $_REQUEST['nomeProvincia'];
        $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
        $sql = "INSERT INTO citta (nome, provincia) VALUES('$n', '$p')";
        if($db->query($sql)){
            echo('<div class="alert alert-success">Città '.$n.' inserita con successo</div>');
        }
        else{
            echo('<div class="alert alert-danger">Attenzione! Città '.$n.' non caricata.</div>');
        }
        break;
    }
    case "listaCitta":{
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
                        <th scope="col">Provincia</th>
                    </tr>
                </thead>
            ');
            echo('<tbody');
            while($record = $rs->fetch_assoc()){
                echo('<tr>
                    <th scope="row">'.$record['id'].'</th>
                    <td>'.$record['nome'].'</td>
                    <td>'.$record['provincia'].'</td>
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
//parte museo
    case "formNuovoMuseo":{
        echo('<form action="index.php">
            <div class="mb-3">
                <label for="nomeMuseo" class="form-label">Nome Museo:</label>
                <input type="text" class="form-control" id="nomeMuseo" name="nomeMuseo" placeholder="Inserisci il nome del nuovo museo">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Numero di telefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Inserisci il numero">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Inserisci la mail">
            </div>

            <div class="mb-3">
                <label for="idCitta" class="form-label">Id della città:</label>
                <input type="text" class="form-control" id="idCitta" name="idCitta" placeholder="Inserisci il codice">
            </div>

            <input type="hidden" name="scelta" value="addNuovoMuseo">
            <button type="submit" class="btn btn-primary">Inserisci nel Database</button>
        </form>');
        break;
    }
    case "addNuovoMuseo":{
        $n = $_REQUEST['nomeMuseo'];
        $tel = $_REQUEST['telefono'];
        $ema = $_REQUEST['email'];
        $idc = $_REQUEST['idCitta'];

        $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
        $sql = "INSERT INTO museo (nome, telefono, email, idCitta) VALUES('$n', $tel, '$ema', '$idc')";
        if($db->query($sql)){
            echo('<div class="alert alert-success">Museo '.$n.' inserito con successo</div>');
        }
        else{
            echo('<div class="alert alert-danger">Attenzione! Museo '.$n.' non caricato.</div>');
        }
        break;
    }
    case "listaMusei":{
       $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
        $sql = "SELECT m.id AS mid, m.nome AS n_mus, telefono, email, c.nome AS c_nome, provincia
                FROM museo AS m INNER JOIN Citta AS c ON (c.id = m.idCitta)
        ";
        $rs = $db->query($sql);
        
        if($rs){
            echo('<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id museo</th>
                        <th scope="col">Nome museo</th>
                        <th scope="col">numero di telefono</th>
                        <th scope="col">email</th>
                        <th scope="col">città</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Gestione</th>
                        
                    </tr>
                </thead>
            ');
            echo('<tbody');
            while($record = $rs->fetch_assoc()){
                echo('<tr>
                    <td>'.$record['mid'].'</td>
                    <td>'.$record['n_mus'].'</td>
                    <td>'.$record['telefono'].'</td>
                    <td>'.$record['email'].'</td>
                    <td>'.$record['c_nome'].'</td>
                    <td>'.$record['provincia'].'</td>
                    <td><a class="btn btn-danger" role="button" href="index.php?scelta=deleteCitta&idMuse='.$record['mid'].'">Cancella</a></td>
                        </tr>
                    ');
            }
            echo('</tbody>');
            echo('<caption>Lista musei presenti a database');
            echo('</table>');
        }
        $db->close();
        break;
    }
    case "deleteMuseo":{
        $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
        $idC = $_REQUEST['idMuse'];

        $sql = "DELETE FROM museo WHERE id=$idC";
        if($db->query($sql))
            echo('<div class="alert alert-success">Museo cancellato con successo.</div>');
        else
            echo('<div class="alert alert-warning">Problema nella cancellazione.</div>');
        $db->close();
        break;
    }
    default:{
        echo('<div class="alert alert-warning">Attenzione, scelta non valida.</div>');
        break;
    }
}







//foot
foot();


// AREA DICHIARATIVA FUNZIONI

function head(){
    echo("<html>
    <head> 
        <title>Verifica</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN\" crossorigin=\"anonymous\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css\">
    </head>
    <body>
        <div class=\"container container-sm\">
");
}

function foot(){
    echo("</div>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL\" crossorigin=\"anonymous\"></script>
        </body>
    </html>");
}

function scriviNavbar(){
    echo('
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Città
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="index.php?scelta=formNuovaCitta">
                                    <i class="bi-plus-circle" style="font-size: 1rem; color: black;"></i>
                                    Nuova Città</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?scelta=listaCitta">
                                    <i class="bi-list-ol" style="font-size: 1rem; color: black;"></i>
                                    Lista Città</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Museo
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="index.php?scelta=formNuovoMuseo">
                                    <i class="bi-plus-circle" style="font-size: 1rem; color: black;"></i>
                                    Inserisci Museo</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?scelta=listaMusei">
                                    <i class="bi-list-ol" style="font-size: 1rem; color: black;"></i>
                                    Lista Musei</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    ');
    return;
}
?>