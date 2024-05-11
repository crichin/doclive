<?php
session_start();

// Vérification si l'utilisateur est déjà connecté, redirection vers la page profile si c'est le cas
if (isset($_SESSION["username"])) {
    header("Location: profile.php");
    exit();
}

// Définir les variables pour stocker les erreurs et les données du formulaire
$usernameOrEmail = $password = "";
$usernameOrEmailError = $passwordError = "";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $usernameOrEmail = $_POST["usernameOrEmail"];
    $password = $_POST["password"];

    // Validation des champs
    if (empty($usernameOrEmail)) {
        $usernameOrEmailError = "Veuillez entrer votre nom d'utilisateur ou votre email.";
    }

    if (empty($password)) {
        $passwordError = "Veuillez entrer votre mot de passe.";
    }

    // Si aucune erreur n'est survenue, on peut procéder à la vérification de l'authentification
    if (empty($usernameOrEmailError) && empty($passwordError)) {
        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=doclive;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        // Vérification de l'authentification
        $requete = $bdd->prepare("SELECT * FROM inscription WHERE nom = ? OR email = ?");
        $requete->execute([$usernameOrEmail, $usernameOrEmail]);
        $user = $requete->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $user["motdepasse"])) {
                // Authentification réussie, création de la session
                $_SESSION["username"] = $user["nom"];
                
                // Création d'un cookie pour 7 jours
                setcookie("username", $user["nom"], time() + (7 * 24 * 60 * 60), "/");

                // Redirection vers la page profile
                header("Location: profile.php");
                exit();
            } else {
                $passwordError = "Mot de passe incorrect.";
            }
        } else {
            $usernameOrEmailError = "Nom d'utilisateur ou email invalide.";
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
    <link rel="stylesheet" href="connexion.css">

</head>
<body>
    <?php include("include/nave.php"); ?>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Connexion</h2>
            <div class="input-group">
                <label for="usernameOrEmail">Nom d'utilisateur ou Email :</label>
                <input type="text" id="usernameOrEmail" name="usernameOrEmail" value="<?php echo htmlspecialchars($usernameOrEmail); ?>" required>
                <span class="error-message"><?php echo $usernameOrEmailError; ?></span>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <span class="error-message"><?php echo $passwordError; ?></span>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>

    <?php include("include/footer.php"); ?>
</body>
</html>
