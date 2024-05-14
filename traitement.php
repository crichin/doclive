<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST["username"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Validation des champs
    $errors = [];

    // Validation du nom
    if (strlen($nom) <= 5) {
        $errors[] = "Le nom doit contenir plus de 5 caractères.";
    }

    // Validation du prénom
    if (strlen($prenom) <= 5) {
        $errors[] = "Le prénom doit contenir plus de 5 caractères.";
    }

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    }

    // Validation du mot de passe
    if ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Si aucune erreur n'est survenue, on peut procéder à l'inscription
    if (empty($errors)) {
        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=doclive;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparation de la requête d'insertion
        $requete = $bdd->prepare("INSERT INTO inscription (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");

        // Exécution de la requête avec les valeurs des champs du formulaire
        $requete->execute([$nom, $prenom, $email, $password]);

        // Redirection vers la page de connexion
        header("Location: connexion.php");
        exit(); // Assure que le script s'arrête après la redirection
    } else {
        // Affichage des erreurs
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
