CREATE DATABASE health_center ;

USE health_center;


CREATE TABLE centres (
    id_centre       INT AUTO_INCREMENT PRIMARY KEY,
    nom             VARCHAR(150) NOT NULL,
    adresse         VARCHAR(255),
    telephone       VARCHAR(30),
    email           VARCHAR(150)
) ENGINE=InnoDB;

CREATE TABLE docteurs (
    id_docteur      INT AUTO_INCREMENT PRIMARY KEY,
    id_centre       INT NOT NULL,
    nom             VARCHAR(100) NOT NULL,
    prenom          VARCHAR(100) NOT NULL,
    specialite      VARCHAR(150),
    adresse         VARCHAR(255),
    telephone       VARCHAR(30),
    email           VARCHAR(150),
    CONSTRAINT fk_docteur_centre
        FOREIGN KEY (id_centre) REFERENCES centres(id_centre)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE patients (
    id_patient          INT AUTO_INCREMENT PRIMARY KEY,
    id_centre_actuel    INT NOT NULL,
    id_docteur          INT NOT NULL,
    nom                 VARCHAR(100) NOT NULL,
    prenom              VARCHAR(100) NOT NULL,
    telephone           VARCHAR(30),
    email               VARCHAR(150),
    adresse             VARCHAR(255),

    CONSTRAINT fk_patient_centre
        FOREIGN KEY (id_centre_actuel) REFERENCES centres(id_centre)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_patient_docteur
        FOREIGN KEY (id_docteur) REFERENCES docteurs(id_docteur)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE transferts (
    id_transfert        INT AUTO_INCREMENT PRIMARY KEY,
    id_patient          INT NOT NULL,
    id_centre_source    INT NOT NULL,
    id_centre_destination INT NOT NULL,
    motif               VARCHAR(255),
    commentaire         TEXT,

    CONSTRAINT fk_transfert_patient
        FOREIGN KEY (id_patient) REFERENCES patients(id_patient)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_transfert_source
        FOREIGN KEY (id_centre_source) REFERENCES centres(id_centre)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_transfert_destination
        FOREIGN KEY (id_centre_destination) REFERENCES centres(id_centre)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

