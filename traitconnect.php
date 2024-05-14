<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation des champs
    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs.";
    } else {
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

            // Vérification du résultat de la requête
            /*
            if ($stmt->rowCount() > 0) {
                echo "Connexion réussie!";
                // Vous pouvez rediriger l'utilisateur vers une page de succès ici
            } else {
                echo "Email ou mot de passe incorrect.";
            }
            */
        } catch (PDOException $e) {
            echo "Erreur SQL : " . $query . "<br>" . $e->getMessage();

        }

        // Fermer la connexion
        $pdo = null;
    }
}
?>
