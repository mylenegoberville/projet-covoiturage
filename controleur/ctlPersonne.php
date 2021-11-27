<?php
require_once './modele/ModelPersonne.php';
$action= $_REQUEST['action'];
switch ($action) {
	case 'mdpoublie':{
		$_SESSION['mdpoublie']=1;
		break;
	}
	case "NewPersonne" :{

		if (isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['email'])&&isset($_POST['tel'])&&isset($_POST['codeP'])&&isset($_POST['ville'])&&isset($_POST['statut'])) {
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$email=$_POST['email'];
			$dateNaiss=$_POST['dateNaiss'];
			$tel=$_POST['tel'];
			$codeP=$_POST['codeP'];
			$ville=$_POST['ville'];
			$statut=$_POST['statut'];
			$admin=$_POST['admin'];
			//ajouter création d'un mot de passe automatique et crypté

			$mdp=$_POST['mdp'];
			$lignes = ModelPersonne::ajouterPersonne($nom,$prenom,$email,$dateNaiss,$tel,$codeP,$ville,$statut,$admin,$mdp);
			$destinataire = $email;
			$headers='From: covoiturage@alwaysdata.net';
			$sujet='Code de validation pour modifier votre mot de passe';
			$message="Bonjour, voici votre mdp: $mdp";
			mail($destinataire, $sujet, $message, $headers);
			header("location:index.php?controleur=personne&action=listePersonne");			

		}else
		{
			include 'vues/personne/NewPersonne.php';
		}
		break;
	}
	case "modifPersonne" :{ //admin

			//if (isset($_POST['nom'])&&isset($_POST['salaire'])&&isset($_POST['prenom'])&&isset($_POST['email'])&&isset($_POST['tel'])&&isset($_POST['codeP'])&&isset($_POST['ville']))
			if (isset($_POST['nom']))
			{
				$id=$_POST['code'];
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$email=$_POST['email'];
				$tel=$_POST['tel'];
				$codeP=$_POST['codeP'];
				$ville=$_POST['ville'];
				$admin=$_POST['admin'];
				$lignes = ModelPersonne::editPersonne($id,$nom,$prenom,$email,$tel,$codeP,$ville,$admin);
				header("location:index.php?controleur=personne&action=listePersonne");
			}else
			{
				$id=$_GET['idMod'];
				$ligne = ModelPersonne::getPersonne($id);
				include'vues/personne/Update.php';
			}
			
			break;
		}
	case "listePersonne" :{
			
			$lignes = ModelPersonne::getAllPersonne(); 
			include 'vues/personne/ListePersonne.php';
			
			break;
		}
	case "supprimerPersonne" :{
			
			$id=$_GET['idDel'];
			$lignes=ModelPersonne::supprPersonne($id);
			header("location:index.php?controleur=personne&action=listePersonne");			
			break;
		}

	case "validerLogin": {
			$email=$_POST['email'];
			$mdp=$_POST['mdp'];
			$ligne=ModelPersonne::getLoginPers($email);
			if (is_array($ligne))
			{
				if (password_verify($mdp,$ligne['mdp'])) 
				{
					$_SESSION['numSess']=$ligne['idU'];
					$_SESSION['admin']=$ligne['admin'];
					header("location:index.php?controleur=personne&action=connexion");
				}else
				{
					$_SESSION['msgerreur']='Mot de passe incorrect';
				}
			}else
			{
				$_SESSION['msgerreur']='Email inconnu dans la bdd ou incorrect';
			}
			break;
		}

	case "deconnexion":{
		session_start();
		session_destroy();
		header("location:index.php");

		break;
	}

	case "connexion":{
		$sess=$_SESSION['numSess'];
		$np=ModelPersonne::recupinfo($sess);
		include 'vues/personne/connecte.php';
		break;
	}

	case "verifMail_newmdp":{
		$email=$_POST['email'];
		$ligne=ModelPersonne::getMail($email);
		if (is_array($ligne))
		{
			$newmdp=ModelPersonne::aleamdp();
			$modifmdp=ModelPersonne::newmdp($email,$newmdp); //change mdp dans bdd

			$destinataire = $email;
			$headers='From: covoiturage@alwaysdata.net';
			$sujet='Code de validation pour modifier votre mot de passe';
			$message="Bonjour, voici votre code: $newmdp";
			mail($destinataire, $sujet, $message, $headers);
			header('Location:index.php');
			
		}else{
				$_SESSION['msgerreur']='Pas de compte associé à cette adresse';
		}
		break;
	}

	case "infoCompte":{
		$sess=$_SESSION['numSess'];
		$info=ModelPersonne::getPersonne($sess);
		include 'vues/personne/monCompte.php';
		break;
	}

	case "MCompte":{
		$sess=$_SESSION['numSess'];
		$info=ModelPersonne::getPersonne($sess);
		include 'vues/personne/ModifCompte.php';
		break;
	}

	case "Mmdp":{
		$sess=$_SESSION['numSess'];
		$info=ModelPersonne::getPersonne($sess);
		include 'vues/personne/ModifMdp.php';
		break;
	}

	case "modifCompte" :{

		if (!empty($_POST['email'])&&!empty($_POST['tel'])&&!empty($_POST['codep'])&&!empty($_POST['ville']))
		{
			$email=$_POST['email'];
			$tel=$_POST['tel'];
			$codep=$_POST['codep'];
			$ville=$_POST['ville'];


			$lignes = ModelPersonne::editCompte($email,$tel,$codep,$ville);
			
			$_SESSION['msgerreur']='Votre compte a bien été modifier';
			header("location:index.php?controleur=personne&action=infoCompte");


		}else
		{
			$_SESSION['msgerreur']='Veuillez remplir tous les champs';
			header("location:index.php?controleur=personne&action=MCompte");
		}

		break;
	}

	case "modifMdp" :{

		if (!empty($_POST['Amdp'])&&!empty($_POST['Nmdp'])&&!empty($_POST['Cmdp']))
		{
			$email=$_POST['email'];
			$amdp=$_POST['Amdp'];
			$nmdp=$_POST['Nmdp'];
			$cmdp=$_POST['Cmdp'];

			if ($amdp!=$nmdp) 
			{
				$ligne=ModelPersonne::getLoginPers($email);//pour executer le password_verify
				if ($nmdp==$cmdp)
				{
					if (password_verify($amdp,$ligne['mdp']))
					{
						$lignes = ModelPersonne::newmdp($email,$nmdp);
			
						$_SESSION['msgerreur']='Votre compte a bien été modifier';
						header("location:index.php?controleur=personne&action=infoCompte");

					}
				}else
				{
					$_SESSION['msgerreur']='Mot de passe de confirmation différent';
					header("location:index.php?controleur=personne&action=Mmdp");
				}// fin ($nmdp==$cmdp)
			}else{
				$_SESSION['msgerreur']='Le nouveau mot de passe doit être différent';
				header("location:index.php?controleur=personne&action=Mmdp");

			}// fin $amdp=$nmdp
		}else
		{
			$_SESSION['msgerreur']='Veuillez remplir tous les champs';
			header("location:index.php?controleur=personne&action=Mmdp");

		}
		break;
	}
		
}// fin ctlPersonnel
?>