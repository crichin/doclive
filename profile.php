<?php

    // Si aucune erreur n'est survenue, on peut procéder à l'inscription
    
        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=doclive;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }


        $requete = $bdd->prepare("SELECT * FROM INSCRIPTION ");

        // Exécution de la requête avec les valeurs des champs du formulaire
        $requete->execute();

       // Récupération des résultats
while($result = $requete->fetch(PDO::FETCH_ASSOC)) {
    echo $result['nom'] . '<br>';

    
        }
    

 

?>
