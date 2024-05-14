<?php
// Définir les variables pour stocker les erreurs
$usernameError = $nomError = $prenomError = $emailError = $passwordError = $confirmPasswordError = "";

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
    if (empty($username)) {
        $usernameError = "Veuillez entrer votre nom d'utilisateur.";
    }

    if (strlen($nom) <= 5) {
        $nomError = "Le nom doit contenir plus de 5 caractères.";
    }

    if (strlen($prenom) <= 5) {
        $prenomError = "Le prénom doit contenir plus de 5 caractères.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "L'adresse email n'est pas valide.";
    }

    if (empty($password)) {
        $passwordError = "Veuillez entrer votre mot de passe.";
    }

    if ($password !== $confirmPassword) {
        $confirmPasswordError = "Les mots de passe ne correspondent pas.";
    }

    // Si aucune erreur n'est survenue, on peut procéder à l'inscription
    if (empty($usernameError) && empty($nomError) && empty($prenomError) && empty($emailError) && empty($passwordError) && empty($confirmPasswordError)) {
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
    }
}
?>
