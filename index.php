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

    <!-- Section de présentation -->
    <section class="presentation-section">
        <div class="container">
            <h2>Qui sommes-nous ?</h2>
            <p>Nous sommes une équipe passionnée par le partage de connaissances et la facilitation de l'accès à l'information. Notre mission est de rendre l'apprentissage et la recherche plus accessibles à tous.</p>
        </div>
    </section>

    <!-- Section de fonctionnalités -->
    <section class="features-section">
        <div class="container">
            <h2>Nos fonctionnalités</h2>
            <ul>
                <li>Accès à une vaste bibliothèque de documents</li>
                <li>Recherche avancée pour trouver rapidement ce que vous cherchez</li>
                <li>Options de collaboration et de partage avec d'autres utilisateurs</li>
                <li>Interface conviviale et intuitive</li>
            </ul>
        </div>
    </section>

    <!-- Section de témoignages -->
    <section class="testimonials-section">
        <div class="container">
            <h2>Témoignages de nos utilisateurs</h2>
            <div class="testimonial">
                <p>"Doclive m'a vraiment aidé dans mes recherches universitaires. Je le recommande vivement à tous les étudiants."</p>
                <p>- Jeanne D.</p>
            </div>
            <div class="testimonial">
                <p>"Une ressource précieuse pour toute personne en quête de savoir. Merci à l'équipe Doclive!"</p>
                <p>- Pierre L.</p>
            </div>
        </div>
    </section>

    <?php include("include/footer.php"); ?>

    <!-- Intégration du JavaScript -->
    <script src="script.js"></script>

</body>
</html>
