INSERT INTO MarcaAutomobile (nome, nazionalita, sitoWeb)
VALUES ('FIAT', 'IT', 'www.fiat.it');

INSERT INTO MarcaAutomobile (nome, nazionalita, sitoWeb)
VALUES ('BMW', 'DE', 'www.bmw.de');

INSERT INTO MarcaAutomobile (nome, nazionalita, sitoWeb)
VALUES ('SEAT', 'SP', 'www.seat.sp');

INSERT INTO MarcaAutomobile (nome, nazionalita, sitoWeb)
VALUES ('KIA', 'KR', 'www.kia.kr');


-- popolamento tabella modelli automobili

INSERT INTO ModelloAutomobile (nome, annoProduzione, cilindrata, idMarcaAutomobile)
VALUES ('Punto', '2000', '1.4', '1');


INSERT INTO ModelloAutomobile (nome, annoProduzione, cilindrata, idMarcaAutomobile)
VALUES ('Bravo', '2010', '2.0', '1');


INSERT INTO ModelloAutomobile (nome, annoProduzione, cilindrata, idMarcaAutomobile)
VALUES ('500', '2000', '1.4', '1');


INSERT INTO ModelloAutomobile (nome, annoProduzione, cilindrata, idMarcaAutomobile)
VALUES ('M3', '2001', '1.8', '2');

INSERT INTO ModelloAutomobile (nome, annoProduzione, cilindrata, idMarcaAutomobile)
VALUES ('Picanto', '2017', '1.0', '4');

-- visualizzazione di tutte le marche automobilistiche nel database

SELECT * FROM MarcaAutomobile;

-- visualizzare tutte le auto presenti nel database

SELECT * FROM ModelloAutomobile; -- qui al posto della casa automobilistica esce il suo id, serve una query che cambi l'id col nome della casa auto

SELECT ModelloAutomobile.nome, 
       ModelloAutomobile.annoProduzione, 
       ModelloAutomobile.cilindrata, 
       MarcaAutomobile.nome
FROM ModelloAutomobile, MarcaAutomobile
WHERE ModelloAutomobile.idMarcaAutomobile = MarcaAutomobile.id;

-- versione di prima ma abbreviata

SELECT modAut.nome, ModAut.annoProduzione, ModAut.cilindrata, MarcAut.nome
FROM ModelloAutomobile AS ModAut, MarcaAutomobile AS MarcAut
WHERE ModAut.idMarcaAutomobile = MarcAut.id
AND MarcAut.nome = "FIAT"
ORDER BY ModAut.nome ASC;