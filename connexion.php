<!DOCTYPE html />
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>My Chat</title>
	<meta name="theme-color" />
	<meta name="description" content="My Chat" />
	<link rel="icon" href="<your img>" />
	<link rel="apple-touch-icon" href="<your img>" />
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h1>Connectez vous pour entrer dans le chat</h1>
	<br />
	<form id="form" action="<your url>" method="post">
		<input id="ps" type="text" autocomplete="off" name="id" placeholder="identifiant" maxlength="50" />
		<br />
		<input id="ms" type="text" autocomplete="off" name="pass" placeholder="mot de passe" maxlength="50" />
		<br />
		<input class="button" type="submit" name="submit" value="envoyer">
	</form>
</body>
</html>
