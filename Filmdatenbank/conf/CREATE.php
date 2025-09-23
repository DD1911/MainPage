<?php

// PDO - PHP Data Objects

$db = new PDO('mysql:host=localhost;dbname=mysql', 'root', "");
var_dump($db);

$db->query('DROP DATABASE IF EXISTS filmverwaltung;');
$db->query('CREATE DATABASE filmverwaltung;');
$db->query('USE filmverwaltung;');

$db->query('CREATE TABLE filme ('
    . 'id INT PRIMARY KEY AUTO_INCREMENT,'
    . 'titel VARCHAR(255),'
    . 'jahr YEAR,'
    . 'genre VARCHAR(255),'
    . 'vertrieb VARCHAR(255),'
    . 'fsk INT,'
    . 'einspielergebnis FLOAT,'
    . 'laenge INT,'
    . 'cover VARCHAR(255));');

$statement = $db->query('SHOW COLUMNS FROM filme;');
var_dump($statement);

$spalten = $statement->fetchAll();
var_dump($spalten);
