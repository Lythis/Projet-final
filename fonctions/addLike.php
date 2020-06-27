<?php
    $user = "root";
    $pass = "";
    $dbName = "live_question";
    $con = new \PDO("mysql:host=127.0.0.1;dbname=$dbName;charset=UTF8", $user, $pass);

    $query = $con-> prepare('INSERT INTO likes (`#Id_profil`, `#Id_question`) VALUES (:idprofil, :idquestion)');
    $query->bindParam(':idprofil', $_POST["idConnect"]);
    $query->bindParam(':idquestion',  $_POST["id"]);
    $query->execute();
?>