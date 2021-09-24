<?php
$bdd = new PDO(<your sql access>);

if (isset($_POST['supprimer']) && $_POST['supprimer'] != NULL) {

	$bdd->exec("DELETE FROM chat");
	$bdd->exec("ALTER TABLE chat AUTO_INCREMENT=0");
	header("location: <your url>?error=2");

} else {
	if (isset($_POST['ps']) && isset($_POST['ms']) && $_POST['ms']!=NULL && $_POST['ps']!=NULL) {

		$ps = htmlspecialchars($_POST['ps']);
		$ms = htmlspecialchars($_POST['ms']);

		if (strlen($ps) >= 50 || strlen($ms) >= 1000) {
			header("location: <your url>?error=1");
		}
		
		$bdd ->exec("INSERT INTO chat (ps, ms) VALUES ('$ps', '$ms')");

		if (! isset($_COOKIE['ps']) || $_COOKIE['ps'] != $_POST['ps']) {
			setcookie("ps", $_POST['ps'], time() + (86400 * 30 * 7), false, false);
		}

		header("location: <your url>");
	} else {
		header("location: <your url>?error=1");
	}
}
?>
