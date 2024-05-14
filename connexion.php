<?php
// Démarrer la session
session_start();

// Définir les variables pour stocker les erreurs et les données du formulaire
$emailError = $passwordError = "";
$email = "";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validation des champs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "L'adresse email n'est pas valide.";
    }

    if (empty($password)) {
        $passwordError = "Veuillez entrer votre mot de passe.";
    }

    // Si aucune erreur n'est survenue, on peut procéder à la connexion
    if (empty($emailError) && empty($passwordError)) {
        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=doclive;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        // Préparation de la requête de sélection
        $requete = $bdd->prepare("SELECT * FROM inscription WHERE email = ?");
        $requete->execute([$email]);
        $user = $requete->fetch();

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['motdepasse'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nom'];
            
            // Créer un cookie valable pour 7 jours
            setcookie("user_id", $user['id'], time() + (7 * 24 * 60 * 60), "/");
            setcookie("user_name", $user['nom'], time() + (7 * 24 * 60 * 60), "/");

            // Redirection vers la page de profil
            header("Location: profile.php");
            exit(); // Assure que le script s'arrête après la redirection
        } else {
            $passwordError = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="inscript.css">

</head>

<body>
    <?php include("include/nave.php"); ?>
    
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Connexion</h2>
            <div class="input-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                <span class="error-message"><?php echo $emailError; ?></span>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message"><?php echo $passwordError; ?></span>
            </div>
            <button type="submit">Se connecter</button>
            <p>Pas encore inscrit ? <a href="inscription.php">Créez un compte</a></p>
        </form>
    </div>


    <?php include("include/footer.php"); ?>
</body>
</html>
