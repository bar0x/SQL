/*
regione id nome
Provincia id nome id_regione
Comune id nome id_provincia
Cittadino id nome cognome sesso id_comune
*/

CREATE TABLE Cittadino (
    id integer unsigned auto_increment,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    sesso varchar(7) NOT NULL,
    idComune integer unsigned NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (idComune) REFERENCES Comune (id)
) ENGINE=InnoDB;

CREATE TABLE Comune(
    id integer unsigned auto_increment,
    nome varchar (25) NOT NULL,
    idProvincia integer unsigned NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (idProvincia) references Cittadino (id)
)

CREATE TABLE Provincia(
    id integer unsigned auto_increment,
    nome varchar (20) NOT NULL,
    idRegione integer unsigned NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (idRegione) references 
)

SELECT R.nome, COUNT (*) AS num_dante_alighieri
FROM Regione AS R
    INNER JOIN Provincia AS P ON (R.id = P.idRegione)
    INNER JOIN Comune AS Co ON (P.id = C.idRegione)
    INNER JOIN Cittadino AS Ci ON (Co.id = Ci.idComune)
WHERE Ci.nome = 'Dante' AND ci.cognome = 'Alighieri'
GROUP BY R.nome
ORDER BY COUNT(*);