/* calcolo somma saldo di Mattia*/
SELECT nome, sum(saldo), data_transazione
FROM ricarica
WHERE nome = 'Mattia'