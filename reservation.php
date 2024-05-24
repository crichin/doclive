<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="reservation.css"> 
<body>
<?php include("include/nave.php"); ?>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $checkIn = $_POST["check-in"];
    $checkOut = $_POST["check-out"];
    $comments = $_POST["comments"];

    // Afficher les données de réservation
    echo "<h2>Récapitulatif de la réservation :</h2>";
    echo "<p><strong>Nom :</strong> $name</p>";
    echo "<p><strong>Email :</strong> $email</p>";
    echo "<p><strong>Téléphone :</strong> $phone</p>";
    echo "<p><strong>Date d'arrivée :</strong> $checkIn</p>";
    echo "<p><strong>Date de départ :</strong> $checkOut</p>";
    echo "<p><strong>Commentaires :</strong> $comments</p>";
} else {
    // Afficher le formulaire de réservation
?>
<div class="reservation-form">
    <h2>Réserver une chambre</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <!-- Le formulaire envoie les données à la même page -->
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone :</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="check-in">Date d'arrivée :</label>
            <input type="date" id="check-in" name="check-in" required>
        </div>
        <div class="form-group">
            <label for="check-out">Date de départ :</label>
            <input type="date" id="check-out" name="check-out" required>
        </div>
        <div class="form-group">
            <label for="comments">Commentaires :</label>
            <textarea id="comments" name="comments" rows="4"></textarea>
        </div>
        <button type="submit">Réserver</button>
    </form>
</div>
<?php
}
?>

<?php include("include/footer.php"); ?>
</body>

</body>
</html>
