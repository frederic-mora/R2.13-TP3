<?php
/** ARCHITECTURE PHP SERVEUR : Rôle du fichier model.php
 * 
 * Dans ce fichier, on va définir les fonctions chargée de faire les opérations nécessaires sur la BDD.
 * Ces fonctions ont vocations à être appelées par les fonctions de contrôle du fichier controller.php,
 * une fois que les paramètres de la requête ont été vérifiés.
 */


/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "mora");
define("DBLOGIN", "root");
define("DBPWD", "root");

/**
 * Récupère le menu pour un jour spécifique dans la base de données.
 *
 * @param string $j Le jour pour lequel le menu est récupéré.
 * @return array Un tableau d'objets contenant l'entrée, le plat principal et le dessert pour le jour spécifié.
 */
function getMenu($j){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    // Requête SQL pour récupérer le menu
    $sql = "select entree, plat, dessert from Repas where jour='$j'";
    // Exécute la requête SQL
    $answer = $cnx->query($sql); 
    // Récupère les résultats de la requête sous forme d'objets
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    return $res; // Retourne les résultats
}


/**
 * Met à jour le menu pour un jour spécifique dans la base de données.
 *
 * @param string $j Le jour pour lequel le menu est mis à jour.
 * @param string $e La nouvelle entrée pour le menu.
 * @param string $p Le nouveau plat principal pour le menu.
 * @param string $d Le nouveau dessert pour le menu.
 * @return int Le nombre de lignes affectées par la requête de mise à jour.
 * 
 * A SAVOIR: une requête SQL de type update retourne le nombre de lignes affectées par la requête.
 * Si la requête a réussi, le nombre de lignes affectées sera 1.
 * Si la requête a échoué, le nombre de lignes affectées sera 0.
 */
function updateMenu($j, $e, $p, $d){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD); 
    // Requête SQL de mise à jour du menu
    $sql = "update Repas set entree='$e', plat='$p', dessert='$d' where jour='$j'";
     // Exécute la requête SQL
    $answer = $cnx->query($sql);
    // Récupère le nombre de lignes affectées par la requête
    $res = $answer->rowCount(); 
    return $res; // Retourne le nombre de lignes affectées
}

