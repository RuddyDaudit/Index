<?php
include 'fonctions.inc.php';

$source = "C:\wamp64\www\NuageDeMots\source.txt";
$texte = file_get_contents ($source);
$separateurs =  "’. \"?!:" ;


$tab_tok = fractionner($separateurs, $texte);


print_tab ($tab_tok);

?>

<?php


$connexion = mysqli_connect("localhost", "root", "", "indexation");

foreach ($tab_tok as $indice=>$mot)
{
	$sql = "INSERT INTO relation (nom,nomFichier) VALUES ('$mot', '$source')";

	$resultats = mysqli_query($connexion, $sql);

	if ($resultats) echo "<p>LIGNE insérée : $mot - ", "$source</p>";
	else echo "LIGNE erreur : $mot - ", "$source</p>";

}
mysqli_close($connexion);

?>
