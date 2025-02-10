<?php


require("model.php");


/*  Q1

    En utilisant PHPMyAdmin, définir la requête SQL qui permet de mettre à jour un des menus de la semaine
*/

/*  Q2

    Ecrire la fonction updateMenu dans le fichier model.php
    Pour tester le bon fonctionnement de cette fonction vous pouvez ajouter l'instruction suivante 
    en fin de fichier model.php : var_dump( updateMenu('lundi', 'Plâtre', 'Sciure', 'Bois') )
    Puis, via la barre d'adresse de votre navigateur, faire une requête HTTP sur model.php.
    Si cela fonctionne, le menu du lundi doit être modifié en conséquence dans votre BDD et 
    vous devez voir s'afficher 1 sur la page.
*/

/*  Q3

    Dans le fichier script.php (ici), ajouter le code qui contrôle la présence des données de formulaire
    dans une requête HTTP. Et, si ces données sont bien présentes, fait appel à la fonction updateMenu
    pour mettre à jour la BDD.
    On répondra un message de confirmation si la mise à jour s'est bien passée, d'erreur sinon.
    Utilisez la partie cliente "Les menus de la semaine" pour vérifier que la mise à jour est effective.
*/


/*  [ Contrôle de la mise à jour d'un menu ]

    Si la requête HTTP comprend un paramètre 'action', alors on comprend que la requête
    provient du formulaire de mise à jour d'un menu du Back Office.
*/
// TODO (Q3)




/*  [ Contrôle de la demande d'un menu pour un jour donnée ]

    Si l'on atteint ce point du script, on sait déjà que la requête HTTP n'est pas une mise
    à jour d'un menu. Reste à vérifier s'il s'agit d'obtenir le menu d'un jour donné. C'est
    le cas si la requête comprend un paramètre 'jour'.
*/
if ( isset($_REQUEST['jour'] ) && !empty($_REQUEST['jour']) ){
    $jour = $_REQUEST['jour'];
    $menu = getMenu($jour);
    echo json_encode($menu);
    exit(); // termine le script (ce qui est en dessous ne s'exécutera pas)
}

/* 
    Si on atteint ce point du script, c'est que la requête HTTP ne correspond ni à une
    demande de mise à jour d'un menu, ni à une demande d'un menu pour un jour donné.
    Dans ce cas le script répond par un code 404 par défaut.
*/

http_response_code(404);

?>