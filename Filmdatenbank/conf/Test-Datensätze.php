<?php
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $db = new PDO('mysql:host=localhost;dbname=filmverwaltung;charset=utf8', 'root', '', $options);
} catch (PDOException $e) {
    die("Fehler bei der DB-Verbindung: " . $e->getMessage());
}

// Tabelle erstellen, falls sie nicht existiert
$db->exec("
CREATE TABLE IF NOT EXISTS `filme` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `titel` VARCHAR(255) NOT NULL,
    `jahr` INT,
    `genre` VARCHAR(100),
    `vertrieb` VARCHAR(100),
    `fsk` INT,
    `einspielergebnis` DECIMAL(10,2),
    `laenge` INT,
    `cover` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

// Tabelle leeren
$db->exec('TRUNCATE TABLE filme;');

// Testdatensätze einfügen
$db->exec("
INSERT INTO filme (id, titel, jahr, genre, vertrieb, fsk, einspielergebnis, laenge, cover) VALUES
(1, 'Equalizer', 2014, 'Action', 'Sony Pictures', 16, 192.3, 132, 'Equalizer.jpg'),
(2, 'Inception', 2010, 'Science Fiction', 'Warner Bros.', 12, 829.89, 148, 'inception.jpg'),
(3, 'The Dark Knight', 2008, 'Action', 'Warner Bros.', 16, 1004.93, 152, 'Batman.jpg'),
(4, 'Titanic', 1997, 'Drama/Romance', 'Paramount Pictures', 12, 2187.46, 195, 'Titanic.jpg'),
(5, 'The Matrix', 1999, 'Science Fiction', 'Warner Bros.', 16, 466.36, 136, 'Matrix.jpg'),
(6, 'Avatar', 2009, 'Science Fiction', '20th Century Fox', 12, 2923.71, 162, 'avatar.jpg'),
(7, 'Gladiator', 2000, 'Historical Drama', 'DreamWorks', 16, 503.18, 155, 'Gladiator.jpg'),
(8, 'Jurassic Park', 1993, 'Adventure', 'Universal Pictures', 12, 1045.69, 127, 'jurassic_park.jpg'),
(9, 'The Godfather', 1972, 'Crime/Drama', 'Paramount Pictures', 16, 250.34, 175, 'godfather.jpg'),
(10, 'Interstellar', 2014, 'Science Fiction', 'Paramount Pictures', 12, 774.15, 169, 'interstellar.jpg'),
(11, 'Frozen', 2013, 'Animation/Musical', 'Walt Disney', 6, 1280.00, 102, 'Frozen.jpg'),
(12, 'The Rock', 1996, 'Action', 'Bruckheimer Films & Hollywood Pictures', 16, 335, 136, 'rock.jpg'),
(13, 'The Little Things', 2021, 'Krimi', 'Warner Bros. Pictures', 16, 30.8, 128, 'little.jpg'),
(14, 'Idiocracy', 2006, 'Dokumentation', '20th Century Fox', 16, 0.5, 84, 'Idiocracy.jpg'),
(15, 'The Darkest Hour', 2011, 'Science Fiction', 'Sony Pictures', 12, 150.85, 89, 'dark.jpg');
");

// Testabfrage
$stmt = $db->query('SELECT * FROM filme;');
$filme = $stmt->fetchAll();

var_dump($filme);
