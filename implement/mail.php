<?php 

$subject = $_POST['subject'];
$message = $_POST['message'];
$from = $_POST['email'];

$to = "postmaster@alan-coiffard.ovh";

	// Pour envoyer du courrier HTML, l'en-tête Content-type doit être défini.
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Créer les en-têtes de courriel
$headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();

	// Envoi d'email
if(mail($to, $subject, $message, $headers)){
	echo 'Votre message a été envoyé avec succès.';
	header('Location: http://www.alan-coiffard.ovh');
  	exit();
} else{
	echo 'Impossible d\'envoyer des courriels. Veuillez réessayer.';
	header('Location: http://www.alan-coiffard.ovh');
  	exit();
}

?>