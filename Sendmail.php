<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Challenge Php</title>
</head>
<body>
	<h1>Challenge Php Sendmail</h1>
	<img src="donald_duck.png">
		


<?php 
		if  (isset($_POST['email']) and isset($_POST['objet']) and isset($_POST['message'])){
			$destinataire = 'votre_email@example.com';
			$email = htmlentities($_POST['email']);

			if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email))){
				$objet ='Contact: '.stripcslashes($_POST['objet']);
				$message = stripcslashes($_POST['message']);
				$headers = "From: <".$email.">\n";
				$headers = "Reply-To: ".$email."\n";
				$headers = "Content-Type: text/plain; charset=\"iso-8859-1\"";
				if(mail($destinataire,$objet,$message,$headers)){
					echo "<strong>Votre message a bien &eacute;t&eacute; envoy&eacute;.</strong>";
				}
				else{
					echo "<strong style=\"color:#ff0000;\">Une erreur c'est produite lors de l'envois du message.</strong>";
				}
			}

			else {
				echo "<strong style=\"color:#ff0000;\">L'email que vous avez entr&eacute; est invalide.</strong>";
			}
		}
		else {
?>
 	<form method="post" action="">
 		<fieldset>
 			<label for="email" style="display:inline-block;width:100px;"><strong>Email</strong></label>
 			<input type="text" name="email" id="email"/><br/>
 			<label for="objet" style="display:inline-block;width:100px;"><strong>Objet :</strong></label>
 			<input type="text" name="objet" id="objet"/><br/>
 			<label for="message"><strong>Message : </strong></label><br/>
 			<textarea cols="70" rows="4" name="message" id="message"></textarea>
 			<input type="submit" value="Envoyer"/>
 		</fieldset>
 		</form>
 <?php
}
?>

</body>
</html>