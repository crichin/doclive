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
        </form>
    </div>

    <?php include("include/footer.php"); ?>
</body>
</html>
