function verifLogin()
{
	var pse = document.getElementById('pseudoID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(pse.value.length < 4)
	{
		err.innerHTML = "Votre pseudo doit contenir au moins 4 caractères.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Pseudo OK.<br/>";
	}
	return retour;
}

function verifPrenom()
{
	var pre = document.getElementById('prenomID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(pre.value.length < 3)
	{
		err.innerHTML = "Votre prenom doit contenir au moins 3 caractères.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Pseudo OK.<br/>";
	}
	return retour;
}

function verifNom()
{
	var nom = document.getElementById('nomID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(nom.value.length < 2)
	{
		err.innerHTML = "Votre nom doit contenir au moins 2 caractères.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Pseudo OK.<br/>";
	}
	return retour;
}

function verifMdP()
{
	var pwd = document.getElementById('pwdID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(pwd.value.length < 4)
	{
		err.innerHTML = "Votre mot de passe doit contenir au moins 4 caractères.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Mot de passe OK.<br/>";
	}
	return retour;
}

function verifConfirmMdP()
{
	var pwd = document.getElementById('pwdID');
	var confirm = document.getElementById('confirmPwdID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(pwd.value != confirm.value)
	{
		err.innerHTML = "Votre mot de passe n'est pas identique.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Confirmation du mot de passe OK.<br/>";
	}
	return retour;
}

function verifTelephone()
{
	var tel = document.getElementById('telID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(tel.value.length != 10)
	{
		err.innerHTML = "Votre numéro de téléphone est erroné.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Numéro de téléphone OK.<br/>";
	}
	return retour;
}



function verifMail()
{
	var reg = /^[a-z0-9._-]+@[a-z-0-9.-]{2,}[.][a-z]{2,3}$/;
	var mail = document.getElementById('mailID');
	var err = document.getElementById('erreurID');
	err.innerHTML = "";
	var retour = true;
	if(!reg.test(mail.value))
	{
		err.innerHTML = "Mail erroné.<br/>";
		retour = false;
	}
	else
	{
		err.innerHTML = "";
		err.innerHTML = "Mail OK.<br/>";
	}
	return retour;
}

function confirmAll()
{
	var err = document.getElementById('erreurID');
	var all = true;
	if((verifLogin() && verifMdP() && verifConfirmMdP() && verifTelephone() && verifMail()) != true)
	{
		err.innerHTML = "Toutes les conditions ne sont pas remplies.<br/>";
		all = false;
	}
	else
	{
		err.innerHTML= "";
	}
	return all;
}