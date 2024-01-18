DROP TABLE IF EXISTS Vendita;
DROP TABLE IF EXISTS Singolo;
DROP TABLE IF EXISTS Artista;
DROP TABLE IF EXISTS CasaDiscografica;
 
CREATE TABLE CasaDiscografica (
    id integer unsigned auto_increment,
    
    nome varchar(20) NOT NULL,
    tel varchar(10) NOT NULL,
    nazione char(2) NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE Artista (
    id integer unsigned auto_increment,
    
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    anni tinyint,
    nazione char(2) NOT NULL,

    idCasaDiscografica integer unsigned,
    foreign key(idCasaDiscografica) references CasaDiscografica(id),

    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE Singolo (
    id integer unsigned auto_increment,
    
    titolo varchar(50) NOT NULL,
    anno char(4) NOT NULL,
    prezzo float,

    idArtista integer unsigned,
    foreign key(idArtista) references Artista(id),

    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE Vendita (
    id integer unsigned auto_increment,
    
    dataVendita date NOT NULL,
    
    idSingolo integer unsigned,
    foreign key(idSingolo) references Singolo(id),

    PRIMARY KEY (id)
) ENGINE=InnoDB;