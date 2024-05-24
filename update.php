<?php

try {
    // Connexion à la base de données via PDO
    $dsn = "mysql:host=localhost;dbname=doclive";
    $username = "root";
    $password_db = "";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $pdo = new PDO($dsn, $username, $password_db, $options);

    // Vérification des informations de connexion
    $query = "SELECT * FROM inscription WHERE email = :email AND motdepasse = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();


    
    $resultat=$stmt->fetchAll();
    var_dump($resultat);
    

?>

try {
    // Connexion à la base de données via PDO
    $dsn = "mysql:host=localhost;dbname=doclive";
    $username = "root";
    $password_db = "";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $pdo = new PDO($dsn, $username, $password_db, $options);

    // Vérification des informations de connexion
    $query = "SELECT * FROM inscription WHERE email = :email AND motdepasse = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();


    
    $resultat=$stmt->fetchAll();
    var_dump($resultat);