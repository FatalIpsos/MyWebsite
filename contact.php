<!DOCTYPE html>
<html lang="fr">
	<head>
	  <meta name="author" content="------"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="image/------.png"/>
		<title>Me contacter</title>
	</head>

	<body>
		
		<?php include("menus.php");?>

		
		<form method="POST" action="" enctype=“multipart/form-data”> <!--envoi du formulaire primaire -->

		<br/>
			<legend><center>Formulaire de mise en relation</center></legend>
		<br/>
				<p>
					<input type="text" name="nom" id="nom" placeholder="Nom" required>
				</p>
				<p>
					<input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
				</p>
				<p>
					<input type="email" name="email" id="email" placeholder="adresse@email.tld" required>
				</p>
				<p>
					<input type="text" name="objet" id="objet" placeholder="Objet">
				</p>
		<br/>
				<textarea rows="30" cols="210" name="message" id="zonetexte" placeholder="Ecrivez votre message ici"></textarea><br />
				<p><center>
				<input type="reset" name="reset" value="Réinitialiser">
				<input type="submit" name="envoyer" value="Envoyer" />
				</center></p>
		</form>
		<?php

// Envoi du message sur ma boite mail

		if (isset($_POST['envoyer'])) {
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    		$nom = htmlspecialchars(trim($_POST['nom']));
    		$prenom = htmlspecialchars(trim($_POST['prenom']));
    		$objet = htmlspecialchars(trim($_POST['objet']));
    		$message = htmlspecialchars(trim($_POST['message']));

    		$erreur = "Le message n'a pas été transmis suite à une erreur."; 
    
    $sujet="Formulaire de contact";
    $Destinataire="------@------.------";

	$from = "From: ".$prenom." ".$nom."<".$email."> \nMime-Version:\n"; 
	$from .= " 1.0\nContent-Type: text/html; charset=UTF-8\n";
	$header= $sujet;
	
	$messageMail = "
            Formulaire de contact:
            
            Nom :   ".ucfirst($nom)."
            Prénom :   ".ucfirst($prenom)."
            Email :   ".$email."
			Objet :   ".$objet."
			Message :  ".$message."";
            
	if(mail($Destinataire, $sujet, $messageMail, $from))
	{
		echo "Le message a bien été transmis. Merci.";
	}
	else
	{
		echo "Erreur, le message n'a pas pu être transmis.";
	}
		
		}

?>  
	</body>
</html>
