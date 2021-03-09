<?php
header('Location: list.php?id=1');


//fonction qui permet d'avoir les informations sur le serveur
//phpinfo();



// Connexion, sélection de la base de données
/*$dbconn = $db_connection = pg_connect("host=localhost dbname=public user=postgres password=bertin")
or die('Connexion impossible : ' . pg_last_error());

// Exécution de la requête SQL
$query = 'SELECT * FROM v_factures';
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

// Affichage des résultats en HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);*/
?>
