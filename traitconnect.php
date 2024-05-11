<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs email et mot de passe existent
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Vérifier si l'email est valide
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Vérifier si le mot de passe a plus de trois lettres
            if (strlen($password) > 3) {
                // Traitement réussi, l'utilisateur est connecté
                // Redirection vers la page de profil
                header("Location: profile.php");
                exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
            } else {
                // Mot de passe invalide
                echo "Le mot de passe doit avoir plus de trois lettres.";
            }
        } else {
            // Email invalide
            echo "L'adresse email est invalide.";
        }
    } else {
        // Les champs email et mot de passe ne sont pas définis
        echo "Tous les champs sont obligatoires.";
    }
}
?>
