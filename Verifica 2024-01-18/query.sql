-- 1
SELECT a.nome, a.cognome, a.anni 
FROM Artista AS a

-- 2
SELECT s.titolo, s.anno
FROM Singolo AS s, Artista AS a
WHERE a.id = s.idArtista AND a.nome = 'Lenny' AND a.cognome = 'Kravitz'
ORDER BY s.anno ASC;
-- 3
SELECT a.*
FROM Artista AS a, CasaDiscografica AS c
WHERE c.id = a.idCasaDiscografica AND c.nome = 'RCS Records'
ORDER BY a.cognome ASC;

-- 4 INCOMPLETA
SELECT s.titolo, s.prezzo
FROM singolo AS s, vendita AS v
WHERE s.id = v.idSingolo AND v.dataVendita > '2023-01-01' AND v.dataVendita < '2023-12-31'

-- 5 incerta
SELECT s.titolo, s.anno, s.prezzo
FROM singolo AS s, CasaDiscografica AS c
WHERE c.nome = 'Warner Music' OR c.nome = 'Sony Music'

-- 6 
SELECT a.cognome, a.nome, a.nazione
FROM Artista AS a, singolo AS s
WHERE (a.id = s.idArtista) AND s.prezzo >= 2.99

-- 7 incerta
SELECT s.*, a.nazione
FROM singolo AS s, vendita AS v, artista AS a
WHERE s.id = v.idSingolo AND (a.nazione = 'IT' OR a.nazione = 'UK')

-- 8 
SELECT s.titolo, v.dataVendita
FROM singolo AS s, artista AS a, vendita AS v
WHERE s.id = v.idSingolo AND a.id = s.idArtista AND a.nome = 'Irene' AND a.cognome = 'Grandi' AND s.anno = '2019'
ORDER BY dataVendita DESC

-- 9 
SELECT s.*, a.cognome, a.nome, a.anni
FROM singolo AS s, artista AS a, vendita AS v
WHERE s.id = v.idSingolo AND v.dataVendita > '2024-01-01' AND v.dataVendita <= '2024-03-31'

-- 10
SELECT s.titolo, s.anno, v.dataVendita
FROM singolo AS s, artista AS a, vendita AS v, CasaDiscografica AS c
WHERE s.id = v.idSingolo AND c.nome = 'Sony Music'
ORDER BY v.data ASC