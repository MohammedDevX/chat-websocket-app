<?php
try {
    $conn = new PDO("mysql:host=localhost:3307; dbname=chat", "root", "");
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}