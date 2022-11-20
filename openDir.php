<form action=" openDir.php" method="post" >
	Nom du dossier : <input type="text" name="fname">
 <input type="submit">
</form>

<?php
include 'fonctions.inc.php';

if(isset($_POST["fname"])){
	echo $_POST["fname"];
}

//$dir = "fname";
$dir = "C:\wamp64\www\NuageDeMots\alphabet";
//$nRecherche = "fname";

//Concatenation
//$dir = "C:\wamp64\www\NuageDeMots\.."."alphabet";
//$concat = $dir.$nRecherche;


if (file_exists($dir) && is_dir($dir)) {
	$scan_arr = scandir($dir);
	$files_arr = array_diff($scan_arr,array('.','..'));

	foreach ($files_arr as $file) {
		echo $file."<br/>";
		$source = $file;
		$texte = file_get_contents ($source);
		$separateurs =  "’. \"?!:" ;


		$tab_tok = fractionner($separateurs, $texte);


		print_tab ($tab_tok);

		$connexion = mysqli_connect("localhost", "root", "", "indexation");

foreach ($tab_tok as $indice=>$mot)
{
	$sql = "INSERT INTO relation (nom,nomFichier) VALUES ('$mot', '$source')";

	$resultats = mysqli_query($connexion, $sql);

	if ($resultats) echo "<p>LIGNE insérée : $mot - ", "$source</p>";
	else echo "LIGNE erreur : $mot - ", "$source</p>";

}
mysqli_close($connexion);
	}
}else{
	echo "Directory does not exist";
	}


// Ouvre un dossier bien connu, et liste tous les fichiers
/*if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            echo "fichier : $file".filetype($dir.$file)."\n";
        }
        closedir($dh);
    }
}*/



?>