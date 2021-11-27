<?php
require_once './modele/ModelTrajet.php';
require_once './modele/ModelPersonne.php';
$action= $_REQUEST['action'];
switch ($action) {
	

	case "Chercher":{
			include 'vues/trajet/rechercher.php';
			break;
	}
	case "Proposer":{
			$id=$_SESSION['numSess'];
			$lesVoitures = ModelTrajet::getVoiture($id);
			include 'vues/trajet/proposer.php';
			break;
	}
	case "proposition":{
		
		$id=$_SESSION['numSess'];
		$lignes = ModelTrajet::getProposition($id); 
		$nbligne=1; 
		$premierMessageAafficher = 0;
		$l=count($lignes);
		$nbpage = ceil($l / $nbligne);
		$ligne = ModelTrajet::getPropositionP($id,$premierMessageAafficher,$nbligne) ; 
		include 'vues/trajet/mesPropositions.php';
		break;
	}
	case "precedent3" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getProposition($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne;
			$ligne = ModelTrajet::getPropositionP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}	
		case "suivant3" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getProposition($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne; 
			$ligne = ModelTrajet::getPropositionP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}
	
	
	case "Valider":{
		$idv=$_GET['idV'];
		$etat='valider';
		$lignes = ModelTrajet::getValider($idv,$etat);
		header("location:index.php?controleur=trajet&action=proposition");
		break;
	}
	case "Refuser":{
		$idr=$_GET['idR'];
		$etat='refuser';
		$lignes = ModelTrajet::getRefuser($idr,$etat);
					$lignes = ModelTrajet::recompte($id,$place);
		header("location:index.php?controleur=trajet&action=proposition");
		break;
	}
	case "inscrire":{
		
		$id=$_SESSION['numSess'];
		$lignes=ModelTrajet::getInscrire($id);
		$nbligne=1; 
		$premierMessageAafficher = 0;
		$l=count($lignes);
		$nbpage = ceil($l / $nbligne);
		$ligne = ModelTrajet::getInscrireP($id,$premierMessageAafficher,$nbligne) ; 
		include 'vues/trajet/mesInscriptions.php';
		break;
	}
		case "precedent2" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getInscrire($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne;
			$ligne = ModelTrajet::getInscrireP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}	
		case "suivant2" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getInscrire($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne; 
			$ligne = ModelTrajet::getInscrireP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}
	
	case "AddV":{
			include 'vues/trajet/AddVoiture.php';
			break;
	}
		case "NewVoiture" :{
		$id=$_SESSION['numSess'];
		if (isset($_POST['marque'])) {
			$marque=$_POST['marque'];
			$modele=$_POST['modele'];
			$couleur=$_POST['couleur'];
			$immatriculation=$_POST['immatriculation'];
			$distinction=$_POST['distinction'];
			$lignes = ModelTrajet::ajouterVoiture($id,$marque,$modele,$couleur,$immatriculation,$distinction);
			header("location:index.php?controleur=trajet&action=Voiture");			

		}else
		{
			include 'vues/trajet/AddVoiture.php';
		}
		break;
	}
	
	case "proposerTrajet" :{
		
		if (isset($_POST['depart'])&&isset($_POST['arrivee'])&&isset($_POST['date'])&&isset($_POST['heure'])&&isset($_POST['place'])) {
			$id=$_SESSION['numSess'];
			$depart=$_POST['depart'];
			$arrivee=$_POST['arrivee'];
			$date=$_POST['date'];
			$heure=$_POST['heure'];
			$place=$_POST['place'];
			//$escale=$_POST['escale'];
			$voiture=$_POST['voiture'];
			$lignes = ModelTrajet::ajouterTrajet($id,$depart,$arrivee,$date,$heure,$place,$escale, $voiture);
			header("location:index.php?controleur=trajet&action=proposition");			

		}else
		{
			include 'vues/trajet/proposer.php';
		}
	}
	case "rechercher" :{
		$depart=$_POST['depart'];
		$arrivee=$_POST['arrivee'];
		$date=$_POST['date'];
		if (!empty($_POST['depart'])&&!empty($_POST['arrivee'])&&!empty($_POST['date'])){
			$lignes=ModelTrajet::getrecherche($depart, $arrivee, $date);
				}else if (!empty($_POST['depart'])&&!empty($_POST['arrivee'])){
					$lignes=ModelTrajet::getrecherche1($depart, $arrivee);
					}else if (isset($_POST['date'])){
						$lignes=ModelTrajet::getrecherche2($date);
					}
		include 'vues/trajet/ListeTrajet.php';
		
		break;
	}
	case "modifTrajet" :{
		
			if (isset($_POST['depart']))
			{
				
				$id=$_POST['code'];
				$depart=$_POST['depart'];
				$arrivee=$_POST['arrivee'];
				$date=$_POST['date'];
				$heure=$_POST['heure'];
				$place=$_POST['place'];
				$escale=$_POST['escale'];
				$voiture=$_POST['voiture'];
				$lignes = ModelTrajet::editTrajet($id,$depart,$arrivee,$date,$heure,$place,$escale,$voiture);
				header("location:index.php?controleur=trajet&action=Trajet");
				
			}else
			{
				$id=$_GET['idMod'];
				$ligne = ModelTrajet::getModifT($id);
				$idU=$_SESSION['numSess'];
				$lesVoitures = ModelTrajet::getVoiture($idU);
				include'vues/trajet/UpdateT.php';

			}
			
			break;
		}
		case "supprimerTrajet" :{
			
			$id=$_GET['idDel'];
			$lignes=ModelTrajet::supprTrajet($id);
			header("location:index.php?controleur=trajet&action=proposition");			
			break;
		}
		case "modifVoiture" :{

			if (isset($_POST['marque']))
			{
				$id=$_POST['code'];
				$marque=$_POST['marque'];
				$modele=$_POST['modele'];
				$couleur=$_POST['couleur'];
				$immatriculation=$_POST['immatriculation'];
				$distinction=$_POST['distinction'];
				$lignes = ModelTrajet::editVoiture($id,$marque,$modele,$couleur,$immatriculation,$distinction);
				header("location:index.php?controleur=trajet&action=Voiture");
			}else
			{
				$id=$_GET['idMod'];
				$ligne = ModelTrajet::getModifV($id);
				include 'vues/trajet/UpdateV.php';

			}
			
			break;
		}
		case "supprimerVoiture" :{
			
			$id=$_GET['idDel'];
			$lignes=ModelTrajet::supprVoiture($id);
			header("location:index.php?controleur=trajet&action=Voiture");			
			break;
		}
	case "listeTrajet" :{
			$id=$_SESSION['numSess'];
			$lignes = ModelTrajet::getAllTrajet($id); 
			$nbligne=1; 
			$premierMessageAafficher = 0;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$ligne = ModelTrajet::getAllTrajetP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/ListeTrajet.php';
			
			break;
		}	
			case "precedent1" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getAllTrajetP($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne;
			$ligne = ModelTrajet::getAllTrajetP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}	
		case "suivant1" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getAllTrajetP($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne; 
			$ligne = ModelTrajet::getAllTrajetP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}
	
		case "Voiture" :{
			
			$id=$_SESSION['numSess'];
			$lignes = ModelTrajet::getVoiture($id); 
			$nbligne=1; 
			$premierMessageAafficher = 0;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$ligne = ModelTrajet::getVoitureP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}	
		case "precedent" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getVoiture($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne;
			$ligne = ModelTrajet::getVoitureP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}	
		case "suivant" :{
			
			$id=$_SESSION['numSess'];
			$page=$_GET['page'];
			$lignes = ModelTrajet::getVoiture($id); 
			$nbligne=1; 
			$p=$page - 1;
			$l=count($lignes);
			$nbpage = ceil($l / $nbligne);
			$premierMessageAafficher = $p * $nbligne; 
			$ligne = ModelTrajet::getVoitureP($id,$premierMessageAafficher,$nbligne) ; 
			include 'vues/trajet/mesVoitures.php';
			
			break;
		}
		case "Trajet" :{
			
			$id=$_SESSION['numSess'];
			$lignes = ModelTrajet::getProposition($id); 
			include 'vues/trajet/mesPropositions.php';
			
			break;
		}
		case "inscription":{
			
			$idT=$_GET['idI'];
			$id=$_SESSION['numSess'];
			$place=$_GET['nbplaceD'];
			$etat= 'en cours de validation';
			$lignes = ModelTrajet::inscription($idT,$id,$etat);
			$lignes = ModelTrajet::decompte($idT,$place);
			header("location:index.php?controleur=trajet&action=Mail&idT=$idT");
			break;
		}
	
		case "Mail":{
			
			$idT=$_GET['idT'];
			$user =ModelPersonne::getidConducteur($idT);
			$lignes =ModelPersonne::getPersonne($user[0]);
			$destinataire = $lignes['email'];
			$headers='From: covoiturage@alwaysdata.net';
			$sujet='inscription trajet ';
			$message="Bonjour, un utilisateur c'est inscrit sur l'un de vos trajet.Merci de consulter 'mes propositions'";
			mail($destinataire, $sujet, $message, $headers);
			header("location:index.php?controleur=trajet&action=inscrire");
			break;
		}
		
		case "AnnulInscription" :{
			
			$id=$_GET['idA'];
			$place=$_GET['nbplaceD'];
			$lignes=ModelTrajet::Annuler($id);
			$lignes = ModelTrajet::recompte($id,$place);
			header("location:index.php?controleur=trajet&action=inscrire");			
			break;
		}
		
		case "contact":{
			
			$idT=$_GET['id'];
			$id=$_GET['idMail'];
			$user =ModelPersonne::getidConducteur($idT);
			$lignes =ModelPersonne::getPersonne($user[0]);
			$expediteur = $lignes['email'];
			include 'vues/personne/contact.php';			
			break;
		}
		case "contact2":{
			
			$idT=$_GET['C'];
			$id=$_GET['Mail'];
			$sujet=$_GET['S'];
			$message=$_GET['M'];
			include 'vues/personne/contact.php';			
			break;
		}
		
		case "contacter":{
			
			
			$headers="FROM: ".$_POST['code']."";
			$destinataire=$_POST['email'];
			$sujet=$_POST['objet'];
			$message=$_POST['message'];
			if (isset($_POST['mailform']))
				{
					if (!empty($_POST['objet']) && !empty($_POST['email']) && !empty($_POST['message']))

					{ 
						mail($destinataire, $sujet, $message, $headers);
						$msg="Votre message a bien été envoyé";
					}else
					{
						$msg="Veuillez remplir tous les champs";
					}
				}
				header("location:index.php?controleur=trajet&action=contact2&C=".$_POST['code']."&Mail=$destinataire&S=$sujet&M=$message");			
				break;
			}
		
		
		
		
		
}// fin ctlTrajet
?>