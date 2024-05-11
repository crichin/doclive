<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Intégration du CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("include/nave.php"); ?>

    <!-- Section principale -->
    <section class="main-section">
        <div class="container">
            <h1>Bienvenue sur Doclive</h1>
            <p>Doclive est une plateforme en ligne où vous pouvez accéder à une bibliothèque de documents et ressources diverses.</p>
            <a href="connexion.php" class="btn">Se connecter</a>
            <a href="inscription.php" class="btn">S'inscrire</a>
        </div>
    </section>

    <?php include("include/footer.php"); ?>

    <!-- Intégration du JavaScript -->
    <script src="script.js"></script>

    <footer>
    <div class="container">
        <p>&copy; <?php echo date("Y"); ?> Doclive. Tous droits réservés.</p>
        <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
</footer>

</body>


</html>
