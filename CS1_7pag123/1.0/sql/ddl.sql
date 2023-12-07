DROP TABLE IF EXISTS Dipendenti; 
DROP TABLE IF EXISTS Reparti;
DROP TABLE IF EXISTS Citta;

CREATE TABLE Citta (
    id integer unsigned auto_increment,
    nomeCitta varchar(20) NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS Reparti;
CREATE TABLE Reparti (
    id integer unsigned auto_increment,
    nomeReparto varchar(20) NOT NULL,
    idCitta integer unsigned,

    PRIMARY KEY (id),
    foreign key(idCitta) references Citta(id)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS Dipendenti; 
CREATE TABLE Dipendenti (
    id integer unsigned auto_increment,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    
    idReparto integer unsigned,
    idCittaReparto integer unsigned,

    
    PRIMARY KEY (id),
    foreign key(idReparto) references Reparti(id),
    foreign key(idCittaReparto) references Citta(id)
    
) ENGINE=InnoDB;
