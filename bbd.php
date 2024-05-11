<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=doclive', 'root', '');  
}
catch (Exception $e)      
{
die('Erreur : ' . $e->getMessage());
}
?>