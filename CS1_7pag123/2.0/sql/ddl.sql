DROP TABLE IF EXISTS Dipendente; 
DROP TABLE IF EXISTS Reparti;
DROP TABLE IF EXISTS Citta;
DROP TABLE IF EXISTS Pagamento;

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


DROP TABLE IF EXISTS Dipendente; 
CREATE TABLE Dipendente (
    id integer unsigned auto_increment,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    
    idReparto integer unsigned,
    idCittaReparto integer unsigned,

    
    PRIMARY KEY (id),
    foreign key(idReparto) references Reparti(id),
    foreign key(idCittaReparto) references Citta(id)
    
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Pagamento (
    id integer unsigned auto_increment,
    data date,
    causale varchar (255),
    importo float,
    idDipendente integer unsigned,

    PRIMARY KEY (id),
    FOREIGN KEY (idDipendente) REFERENCES Dipendente(id)
) ENGINE=InnoDB;