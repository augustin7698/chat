<?php
$bdd = new PDO(<your sql access>);

$reponse = $bdd->query("SELECT * FROM chat ORDER BY id DESC LIMIT 1");

while($donnees = $reponse->fetch()){
	echo json_encode($donnees);
	$donnes = true;
}

if ($donnes != true) {
	?>{"id":"0","0":"0","ps":"aucune_donnees","0":"aucune_donnees","ms":"aucune_donnees","0":"aucune_donnees"}<?php
}
?>
