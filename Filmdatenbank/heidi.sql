-- SHOW DATABASES;

DROP DATABASE IF EXISTS filmverwaltung;
CREATE DATABASE filmverwaltung;
USE filmverwaltung;

CREATE TABLE filme (
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       titel VARCHAR(255),
                       jahr YEAR,
                       genre VARCHAR(255),
                       vertrieb VARCHAR(255),
                       fsk INT,
                       einspielergebnis FLOAT,
                       laenge INT,
                       cover VARCHAR(255)

);

-- TODO: Regisseure, mehrere Genres, Autoren

SHOW COLUMNS FROM filme;

INSERT INTO filme VALUES
    (1, 'Equalizer', 2014, 'Action', 'Sony Pictures', 16, 192.3, 132, NULL);

SELECT * FROM filme;