-- 1
INSERT INTO CasaDiscografica(nome, tel, nazione)
VALUES('Sony', '3784256784', 'UK');

INSERT INTO CasaDiscografica(nome, tel, nazione)
VALUES('Piro', '5794821145', 'US');


INSERT INTO CasaDiscografica(nome, tel, nazione)
VALUES('Warner Music', '6822794558', 'US');

INSERT INTO CasaDiscografica(nome, tel, nazione,)
VALUES('Universal', '2795834288', 'IT');

-- prove per query
INSERT INTO CasaDiscografica(nome, tel, nazione)
VALUES('RCS Records', '4216794758', 'US');


-- 2
INSERT INTO Artista(nome, cognome, anni, nazione, idCasaDiscografica)
VALUES('Rodrigo', 'Amarante', 47 , 'SP', 1);

INSERT INTO Artista(nome, cognome, anni, nazione, idCasaDiscografica)
VALUES('Francesco', 'Gabbani', 51 , 'IT', 2);

INSERT INTO Artista(nome, cognome, anni, nazione, idCasaDiscografica)
VALUES('Roberto', 'Vecchioni', 57 , 'IT', 3);

INSERT INTO Artista(nome, cognome, anni, nazione, idCasaDiscografica)
VALUES('Irene', 'Grandi', 52 , 'IT', 2);


-- prove per query
INSERT INTO Artista(nome, cognome, anni, nazione, idCasaDiscografica)
VALUES('Lenny', 'Kravitz', 61 , 'UK', 1);

INSERT INTO Artista(nome, cognome, anni, nazione, idCasaDiscografica)
VALUES('Joe', 'Smith', 21 , 'US', 5);

-- 3
INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Acqua', '1997', 7.50, 4);

INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Tritolo', '2014', 11.20, 5);

INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Morto mai', '2020', 17.0, 6);


-- prove per query

INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Bones', '1995', 15.00, 7);

INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Peace and love', '2001', 10.00, 7);

INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Near you', '2000', 2.00, 8);

INSERT INTO Singolo(titolo, anno, prezzo, idArtista)
VALUES('Al tuo fianco', '2019', 5.00, 9);


-- 4
INSERT INTO Vendita(dataVendita, idSingolo)
VALUES('2023-01-10', 1);

INSERT INTO Vendita(dataVendita, idSingolo)
VALUES('2017-05-09', 2);

INSERT INTO Vendita(dataVendita, idSingolo)
VALUES('2021-11-15', 3);

INSERT INTO Vendita(dataVendita, idSingolo)
VALUES('2016-05-22', 2);

-- prove per query
INSERT INTO Vendita(dataVendita, idSingolo)
VALUES('2024-02-22', 2);

