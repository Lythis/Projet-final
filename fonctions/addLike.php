<?php
    #require_once('./fonctions/fonctions.php');
    $con = connexionBdd();

    $query = $con->prepare('INSERT INTO likes (`#Id_profil`, `#Id_question`) VALUES (:idprofil, :idquestion)');
    $query->bindParam(':idprofil', $_SESSION["utilisateur"]["id"]);
    $query->bindParam(':idquestion',  $_GET["idQuestion"]);
    $query->execute();
?>