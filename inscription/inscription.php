<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <link rel="stylesheet" href="inscript.css">
    <link rel="stylesheet" href="../css/style.css">
</head>


<body>
    <div class="container">
        <form action="traitement.php" method="post">
            <h2>Formulaire d'Inscription</h2>
            <div class="input-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="input-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="input-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
