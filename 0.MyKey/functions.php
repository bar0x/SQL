<?php

function printTotalFromName($fname,$_location, $_user, $_password, $_dbName) {
    //faccio la query
    $db = new mysqli($_location,$_user,$_password,$_dbName); 
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