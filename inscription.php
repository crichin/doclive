<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <link rel="stylesheet" href="inscript.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("include/nave.php"); ?>

    <div class="container">
        <form id="inscriptionForm" action="traitement.php" method="post">
            <h2>Formulaire d'Inscription</h2>
            <div class="input-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <div id="error-username" class="error"></div>
            </div>
            <div class="input-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <div id="error-nom" class="error"></div>
            </div>
            <div class="input-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <div id="error-prenom" class="error"></div>
            </div>
            <div class="input-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <div id="error-email" class="error"></div>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <div id="error-password" class="error"></div>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <div id="error-confirm-password" class="error"></div>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <div id="errors" class="errors" style="display: none;"></div>
    </div>

    <script src="inscription.js"></script>
</body>
</html>
