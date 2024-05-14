<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Démarrer la session
session_start();

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

// Préparation de la requête pour obtenir les informations de l'utilisateur
$requete = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
$requete->execute([$user_id]);
$user = $requete->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les nouvelles données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    
    // Mettre à jour les informations de l'utilisateur dans la base de données
    $requete = $bdd->prepare("UPDATE inscription SET nom = ?, prenom = ?, email = ? WHERE id = ?");
    $requete->execute([$nom, $prenom, $email, $user_id]);

    // Actualiser les informations de l'utilisateur
    header("Location: profile.php");
    exit();
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
        </div>
        <div class="profile-content">
            <div class="profile-block">
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
                    <button type="submit">Mettre à jour</button>
                </form>
            </div>
            <div class="profile-block">
                <h3>Autres Informations</h3>
                <p>Vous pouvez ajouter d'autres informations ici.</p>

            </div>
        </div>
        <form action="logout.php" method="post" class="logout-form">
            <button type="submit" class="logout-button">Se déconnecter</button>
        </form>
    </div>

    <?php include("include/footer.php"); ?>

</body>
</html>
