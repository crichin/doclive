<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form id="loginForm" action="traitconnect.php" method="post">
            <h2>Connexion</h2>
            <div class="input-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
            <a href="inscription.php" class="inscription-link">Pas encore inscrit ? S'inscrire ici</a>

        </form>
        <div id="errorTable"></div> <!-- Div pour afficher les erreurs -->
    </div>

    <script>
        // Fonction pour afficher les erreurs dans un tableau
        function displayErrors(errors) {
            // Sélection de la div où afficher les erreurs
            var errorDiv = document.getElementById('errorTable');

            // Création du tableau et de l'en-tête
            var table = document.createElement('table');
            var headerRow = table.insertRow();
            var headerCell = headerRow.insertCell();
            headerCell.textContent = 'Erreurs de connexion';
            headerCell.colSpan = 2;
            headerCell.style.fontWeight = 'bold';

            // Ajout des erreurs dans le tableau
            errors.forEach(function(error) {
                var row = table.insertRow();
                var cell1 = row.insertCell();
                var cell2 = row.insertCell();
                cell1.textContent = error.field; // Champ avec erreur
                cell2.textContent = error.message; // Message d'erreur
            });

            // Effacer le contenu précédent et ajouter le tableau
            errorDiv.innerHTML = '';
            errorDiv.appendChild(table);
        }

        // Événement de soumission du formulaire
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêcher la soumission du formulaire par défaut

            // Récupération des valeurs des champs
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Validation côté client (exemple)
            var errors = [];
            if (email.trim() === '') {
                errors.push({ field: 'Email', message: 'Veuillez saisir votre adresse email.' });
            }
            if (password.trim() === '') {
                errors.push({ field: 'Mot de passe', message: 'Veuillez saisir votre mot de passe.' });
            }

            // Si des erreurs sont présentes, les afficher
            if (errors.length > 0) {
                displayErrors(errors);
            } else {
                // Si pas d'erreur, soumettre le formulaire
                this.submit();
            }
        });
    </script>
</body>
</html>
