document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("inscriptionForm");
    form.addEventListener("submit", function(event) {
        var errors = [];

        // Validation du nom d'utilisateur
        var username = document.getElementById("username").value;
        if (username.length < 5) {
            errors.push("Le nom d'utilisateur doit contenir au moins 5 caractères.");
            document.getElementById("error-username").innerText = "Le nom d'utilisateur doit contenir au moins 5 caractères.";
            document.getElementById("error-username").classList.add("error"); // Ajout de la classe "error"
        } else {
            document.getElementById("error-username").innerText = "";
        }

        // Validation du nom
        var nom = document.getElementById("nom").value;
        if (nom.length < 5) {
            errors.push("Le nom doit contenir au moins 5 caractères.");
            document.getElementById("error-nom").innerText = "Le nom doit contenir au moins 5 caractères.";
            document.getElementById("error-nom").classList.add("error"); // Ajout de la classe "error"
        } else {
            document.getElementById("error-nom").innerText = "";
        }

        // Validation du prénom
        var prenom = document.getElementById("prenom").value;
        if (prenom.length < 5) {
            errors.push("Le prénom doit contenir au moins 5 caractères.");
            document.getElementById("error-prenom").innerText = "Le prénom doit contenir au moins 5 caractères.";
            document.getElementById("error-prenom").classList.add("error"); // Ajout de la classe "error"
        } else {
            document.getElementById("error-prenom").innerText = "";
        }

        // Validation de l'email
        var email = document.getElementById("email").value;
        if (!/^\S+@\S+\.\S+$/.test(email)) {
            errors.push("L'email n'est pas valide.");
            document.getElementById("error-email").innerText = "L'email n'est pas valide.";
            document.getElementById("error-email").classList.add("error"); // Ajout de la classe "error"
        } else {
            document.getElementById("error-email").innerText = "";
        }

        // Validation du mot de passe
        var password = document.getElementById("password").value;
        if (password.length < 8) {
            errors.push("Le mot de passe doit contenir au moins 8 caractères.");
            document.getElementById("error-password").innerText = "Le mot de passe doit contenir au moins 8 caractères.";
            document.getElementById("error-password").classList.add("error"); // Ajout de la classe "error"
        } else {
            document.getElementById("error-password").innerText = "";
        }

        // Validation de la confirmation du mot de passe
        var confirmPassword = document.getElementById("confirm-password").value;
        if (confirmPassword !== password) {
            errors.push("Les mots de passe ne correspondent pas.");
            document.getElementById("error-confirm-password").innerText = "Les mots de passe ne correspondent pas.";
            document.getElementById("error-confirm-password").classList.add("error"); // Ajout de la classe "error"
        } else {
            document.getElementById("error-confirm-password").innerText = "";
        }

        // Affichage des erreurs
        var errorsContainer = document.getElementById("errors");
        if (errors.length > 0) {
            var errorsHTML = "<h3>Erreurs :</h3><ul>";
            errors.forEach(function(error) {
                errorsHTML += "<li>" + error + "</li>";
            });
            errorsHTML += "</ul>";
            errorsContainer.innerHTML = errorsHTML;
            errorsContainer.style.display = "block"; // Affiche le tableau d'erreurs
            event.preventDefault(); // Empêche la soumission du formulaire
        } else {
            errorsContainer.innerHTML = ""; // Efface le contenu du tableau d'erreurs s'il est vide
            errorsContainer.style.display = "none"; // Cache le tableau d'erreurs s'il est vide
        }
    });
});
