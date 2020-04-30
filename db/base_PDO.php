<?php
	#Fonction pour accéder à la base de données
	function connexionBdd() {
		$user = "root";
		$pass = "";
		$dbName = "live_question";
		return new \PDO("mysql:host=127.0.0.1;dbname=$dbName;charset=UTF8", $user, $pass);
	}
?>