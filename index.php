<!DOCTYPE html />
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>My Chat</title>
	<meta name="theme-color" />
	<meta name="description" content="My Chat" />
	<link rel="icon"  href="<your img>" />
	<link rel="apple-touch-icon"  href="<your img>" />
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body onload="actualiser()">
	<h1>Bienvenue sur le chat</h1>
	<br />
	<form id="form" action="traitement.php" method="post">
		<input onchange="script" id="ps" type="text" autocomplete="off" name="ps" placeholder="votre pseudo" maxlength="50" value="<?php echo $_COOKIE['ps'];?>" />
		<br />
		<input onchange="script" id="ms" type="text" autocomplete="off" name="ms" placeholder="votre message" maxlength="400" />
		<br />
		<input class="button" type="submit" name="submit" value="envoyer">
		<input class="button" type="submit" name="supprimer" value="supprimer la conversation">
	</form>
	<div id="message">
		<?php
		$bdd = new PDO(<your sql access>);

		if ($_COOKIE['id'] == '<your id>' && $_COOKIE['pass'] == '<your password>') {

		} elseif ($_POST['id'] == '<your id>' && $_POST['pass'] == '<your password>') {
			setcookie("id", '<your id>', time() + (86400 * 30 * 7), false, false);
			setcookie("pass", '<your password>', time() + (86400 * 30 * 7), false, false);
		} else {
			header("location: <your url>/connexion.php");
		}

		$reponse = $bdd->query("SELECT ps, ms FROM chat ORDER BY id DESC LIMIT 100");

		if ($_GET['error'] == 1) {
			echo "<a href=\"<your url>\"><p id=\"error\">Votre message n'a pas pu être transféré car:<br />- Votre message comporte plus de 1000 caractères.<br />- Votre pseudo comporte plus de 50 caractères.<br />- Vous n'avez pas indiqué de message.<br />- Vous n'avez pas indiqué de pseudo.<br /><br /> Appuyez sur l'alerte pour la masquer.</p></a><hr />";
		} 

		if ($_GET['error'] == 2) {
			echo "<a href=\"<your url>\"><p id=\"supprimer\">Tout l'historique a bien été supprimé.<br /><br /> Appuyez sur l'alerte pour la masquer.</p></a><hr />";
		}

		$content = false;
		while($donnees = $reponse->fetch()) {
			$content = true;
			echo("<p><strong>" . $donnees["ps"] . " " . "</strong>a écrit:<br />" . $donnees["ms"]) . "</p><hr />";
		}

		if ($content == false) {
			echo "<p>aucun contenue pour le moment<hr /></p>";
		}
		?>
	</div>
	<script type="text/javascript">

function sleep(ms) {
	return new Promise(resolve => setTimeout(resolve, ms));
}

async function actualiser() {

	signale = "aucun";

	fetch('<your url>/donne.php')
			.then(response => response.json())
			.then(data => signale = data.ps + data.ms);

	signale2 = "aucun";
	while (signale == signale) {
		await sleep(2000);
		fetch('<your url>/donne.php')
			.then(response => response.json())
			.then(data => signale2 = data.ps + data.ms);

		if (signale2 != signale && signale2 != "aucun") {
			window.location.href="<your url>";
		}
	}
}
		
	</script>
</body>
</html>
