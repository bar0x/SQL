DROP TABLE IF EXISTS Ricarica;

CREATE TABLE Ricarica(
    id integer auto_increment,
    nome varchar(15) NOT NULL,
    cognome varchar(15) NOT NULL,
    saldo DECIMAL(3, 2) NOT NULL,
    data_transazione DATE,

    PRIMARY KEY(id)
);


DROP TABLE IF EXISTS Utente;

CREATE TABLE Utente(
    id integer auto_increment,
    referente varchar(15) NOT NULL,
    password varchar(15) NOT NULL,

    PRIMARY KEY(id)
) CHARACTER SET=utf8_bin;
