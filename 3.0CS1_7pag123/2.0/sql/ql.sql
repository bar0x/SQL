
-- visualizza tutti i reparti presenti nella città di Mantova.
SELECT rep.nomeReparto
FROM Reparto AS rep, Citta AS c
WHERE nomeCitta = 'Mantova' AND c.id = rep.idCittaReparto


-- visualizzare tutti i reparti presenti nelle città di Mantova e Vicenza.
SELECT rep.nomeReparto
FROM Reparto AS rep, Citta AS c
WHERE c.id = rep.idCittaReparto AND (c.nomeCitta = 'Mantova' OR c.nomeCitta = 'Vicenza')


-- visualizzare i dipendenti che lavorano nella città di Mantova.
SELECT d.nome, d.cognome
FROM Dipendente AS d, Citta AS c, Reparto as rep
WHERE d.idReparto = rep.id AND rep.idCittaReparto = c.id AND c.nomeCitta = 'Mantova'


-- ----------------------------------------------------
--Query del 2024-02-01
-- ----------------------------------------------------
-- visualizzare il numero di pagamenti totali effettuati

SELECT COUNT(ID)
FROM Pagamento;

-- visualizzare il numero di pagamenti superiori o uguali a 1200€
SELECT COUNT (id)
FROM Pagamento
WHERE importo >= 1200;

-- visualizzare l'importo minimo erogato
SELECT MIN(importo)
FROM Pagamento;

-- visualizzare l'importo massimo erogato
SELECT MAX(importo)
FROM Pagamento;

-- Visualizzare media degli importi erogati
SELECT AVG(importo)
FROM Pagamento;

-- visualizzare la media degli importi del mese di gennaio
SELECT AVG(importo)
FROM Pagamento
WHERE data >= 2024/01/01 AND data <= 2024/01/31

-- visualizzare per ogni dipendente il proprio pagamento
SELECT d.cognome, d.nome, p.data, p.importo
FROM Dipendente AS d, Pagamento AS p
WHERE d.id = p.idDipendente;

-- visualizzare il dipendente (nome, cognome) che ha recepito il pagamento minimo
SELECT d.cognome, d.nome, p.importo
FROM Dipendente AS d, Pagamento AS p
WHERE WHERE d.id = p.idDipendente
AND p.importo = (
    SELECT MIN(importo)
    FROM Pagamento;
)

-- visualizzare i dipendenti (nome, cognome) che hano percepito stipendi superiori alla media generale.
SELECT d.cognome, d.nome, p.importo
FROM Dipendente AS d, Pagamento AS p
WHERE d.id = p.idDipendente AND
p.importo > (
    SELECT AVG(Importo)
    FROM Pagamento;
)

-- visualizzare il totale degli importi erogati
SELECT SUM(Importo)
FROM Pagamento;

-- visualizzare il totale degli importi del dipendente 'Rossi Mario'
SELECT SUM(Importo)
FROM Pagamento AS p, Dipendente AS d
WHERE d.id = p.idDipendente AND d.cognome = 'Rossi' AND d.nome = 'Mario'

-- visualizzare il totale percepito da ogni singolo dipendente {UTILIZZO DEL RAGGRUPPAMENTO}
SELECT d.cognome, d.nome,  SUM(Importo) AS 'Totale Percepito'
FROM Pagamento AS p, Dipendente AS d
WHERE d.id = p.idDipendente
GROUP BY d.id;   
HAVING SUM (Importo) > 1200; -- filtro sui dati processati, quindi sulla somma degli importi invece che gli importi singoli. si usa "Having" per richiedere condizioni sul dato trattato.