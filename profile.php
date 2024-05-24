<?php
// Démarrer la session
session_start();


// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=doclive;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


// Récupérer les informations de l'utilisateur à partir de la session ou du cookie
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];

// afficher les info utilisateur 

$requete0 = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
$requete0->execute([$user_id]);
$userInfo = $requete0->fetch();
//echo "<pre> ".print_r($userInfo) ."</pre>" ;

// Préparation de la requête pour obtenir les informations de l'utilisateur
$requete = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
$requete->execute([$user_id]);
$user = $requete->fetch();

// Initialiser les variables de message d'erreur pour le changement de mot de passe
$currentPasswordError = $newPasswordError = $confirmNewPasswordError = $changePasswordSuccess = "";

// Vérifier si le formulaire de mise à jour des informations a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_info'])) {
    // Récupérer les nouvelles données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    
    // Mettre à jour les informations de l'utilisateur dans la base de données
    $requete = $bdd->prepare("UPDATE inscription SET nom = ?, prenom = ?, email = ? WHERE id = ?");
    $requete->execute([$nom, $prenom, $email, $user_id]);

   
    // Actualiser les informations de l'utilisateur
    header("Location: profile.php?success=1");
    exit();
}


// Vérifier si le formulaire de changement de mot de passe a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
    // Récupérer les données du formulaire
    $currentPassword = $_POST["current-password"];
    $newPassword = $_POST["new-password"];
    $confirmNewPassword = $_POST["confirm-new-password"];

    // Vérifier le mot de passe actuel
    if (!password_verify($currentPassword, $user['motdepasse'])) {
        $currentPasswordError = "Le mot de passe actuel est incorrect.";
    }

    // Vérifier que le nouveau mot de passe est bien saisi et correspond
    if (empty($newPassword)) {
        $newPasswordError = "Veuillez entrer un nouveau mot de passe.";
    } elseif ($newPassword !== $confirmNewPassword) {
        $confirmNewPasswordError = "Les nouveaux mots de passe ne correspondent pas.";
    }

    // Si aucune erreur n'est survenue, mettre à jour le mot de passe
    if (empty($currentPasswordError) && empty($newPasswordError) && empty($confirmNewPasswordError)) {
        // Hachage du nouveau mot de passe
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Mettre à jour le mot de passe dans la base de données
        $requete = $bdd->prepare("UPDATE inscription SET motdepasse = ? WHERE id = ?");
        $requete->execute([$hashedNewPassword, $user_id]);

        // Redirection vers la page de profil avec un message de succès
        header("Location: profile.php?password_success=1");
        exit();
    }
}

// Vérifier les paramètres d'URL pour afficher les messages de succès
if (isset($_GET['success'])) {
    $changePasswordSuccess = "Informations mises à jour avec succès.";
} elseif (isset($_GET['password_success'])) {
    $changePasswordSuccess = "Mot de passe changé avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <?php include("include/nave.php"); ?>

    <div class="profile-container">
        <div class="profile-header">
            <h2>Profil de <?php echo htmlspecialchars($user['nomutilisateur']); ?></h2>
        
        <img src="<?= $userInfo["profile"]?> " srcset="">
        </div>
        <div class="profile-content">
            <?php if ($changePasswordSuccess): ?>
                <div class="success-message"><?php echo $changePasswordSuccess; ?></div>
            <?php endif; ?>
            <div class="profile-block">


                    <!-- photo de profil     -->
                <h1>ADD PROFILE PICTURE </h1>

                <form action="upload.php" method="post"  enctype="multipart/form-data">
                    <input type="file" name="pictures" id="">
                        <button type="submit">profile pic</button>
                </form>
                <h3>Informations Personnelles</h3>
                <form action="profile.php" method="post">
                    <div class="input-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <button type="submit" name="update_info">Mettre à jour</button>
                </form>
            </div>
            <div class="profile-block">
                <h3>Changer le mot de passe</h3>
                <form action="profile.php" method="post">
                    <div class="input-group">
                        <label for="current-password">Mot de passe actuel :</label>
                        <input type="password" id="current-password" name="current-password" required>
                        <span class="error-message"><?php echo $currentPasswordError; ?></span>
                    </div>
                    <div class="input-group">
                        <label for="new-password">Nouveau mot de passe :</label>
                        <input type="password" id="new-password" name="new-password" required>
                        <span class="error-message"><?php echo $newPasswordError; ?></span>
                    </div>
                    <div class="input-group">
                        <label for="confirm-new-password">Confirmer le nouveau mot de passe :</label>
                        <input type="password" id="confirm-new-password" name="confirm-new-password" required>
                        <span class="error-message"><?php echo $confirmNewPasswordError; ?></span>
                    </div>
                    <button type="submit" name="change_password">Changer le mot de passe</button>
                </form>
            </div>
        </div>
        <form action="logout.php" method="post" class="logout-form">
            <button type="submit" class="logout-button">Se déconnecter</button>
        </form>
    </div>

    <?php include("include/footer.php"); ?>
</body>
</html>
