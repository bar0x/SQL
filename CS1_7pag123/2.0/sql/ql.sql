
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