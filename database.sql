CREATE DATABASE IF NOT EXISTS gestion_clinique;
USE gestion_clinique;

CREATE TABLE IF NOT EXISTS patient (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS specialite (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) UNIQUE
);

CREATE TABLE IF NOT EXISTS medecin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    specialite_id INT,
    FOREIGN KEY (specialite_id) REFERENCES specialite(id)
);

CREATE TABLE IF NOT EXISTS rendezvous (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_rv DATE,
    heure_rv TIME,
    statut VARCHAR(30) DEFAULT 'EN_ATTENTE',
    patient_id INT,
    medecin_id INT,
    demande_annulation TINYINT(1) DEFAULT 0,
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (medecin_id) REFERENCES medecin(id)
);

INSERT INTO specialite (nom) VALUES ('Généraliste'), ('Dentaire'), ('Cardiologue');

INSERT INTO medecin (nom, prenom, specialite_id) VALUES
('Diop', 'Fatou', 1),
('Fall', 'Amadou', 2),
('Sow', 'Marie', 3),
('Ndoye', 'Babacar', 1);
