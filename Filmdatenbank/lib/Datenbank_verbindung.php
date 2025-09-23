<?php
// lib/Datenbank_verbindung.php

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$db = new PDO('mysql:host=localhost;dbname=filmverwaltung;charset=utf8', 'root', '', $options);
