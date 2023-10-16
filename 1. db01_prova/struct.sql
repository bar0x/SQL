/* ----------------
definizione tabelle
-------------------*/

CREATE TABLE Uomo(
    id integer unsigned auto_increment,
    nome varchar(39) NOT NULL,
    cognome varchar(15) NOT NULL,
    paese varchar(15) NOT NULL,
    anni TINYINT,

    PRIMARY KEY(id)
)



/* ----------------
 Inserimento utenti
-------------------*/

INSERT INTO Uomo(nome, cognome, paese, anni)
VALUES('Gino', 'Rossi', 'Ostiglia', 37);


INSERT INTO Uomo(nome, cognome, paese, anni)
VALUES('Roberto', 'Saviano', 'Modena', 71);
VALUES('Vito', 'Ciancimino', 'Napoli', 153);
VALUES('Totò', 'Riina', 'Corleone', 96);


/* Non funziona poichè un campo contrassegnato come not null non accetta un campo vuoto*/
INSERT INTO Uomo(cognome, paese, anni)
VALUES('Fiorello', 'Nuvolato', 33);





/* ------------- 
  query examples
----------------*/

/* - visualizzare tutti i record neella tabella Uomo */
SELECT *
FROM Uomo;

/* -visualizzare tytti gli uomini con cognome "Rossi" */
SELECT *                /* scelta dampo da cui selezionare */
From Uomo               /* scelta della tabella in cui cercare */
WHERE cognome='Rossi';  /* condizione di visualizzazione (filtro) */


/* -visualizzare nome, paese e anni degli uomini con cognome "Rossi" */
SELECT nome, paese, anni
FROM Uomo
WHERE cognome = 'rossi';

/* -visualizzare tutti gli uomini presenti con tutti i campi, ordinandoli per cognome in ordine crescente. */
SELECT *
FROM Uomo
ORDER BY cognome ASC;


/* -visualizzare tutti i campi di tutti gli uomini presenti con cognome "Rossi" ordinati per nome */
SELECT *
FROM Uomo
WHERE cognome = 'Rossi'
ORDER BY nome ASC; /* DESC per l'ordine decrescente*/
