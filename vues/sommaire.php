    <!-- Division pour le sommaire -->
<?php 
if (isset($_SESSION['numSess']))
{
	if($_SESSION['admin'] == 1)
	{
		?>
	<div id="navigation" class="degardéCo">
		<div class="container">

		<ul class="navbar">
			<li ><a class="nav-link" href="index.php?controleur=personne&action=listePersonne">Liste personne</a></li>
			<li ><a class="nav-link" href="index.php?controleur=trajet&action=listeTrajet">Liste trajet</a></li>
			<li ><a class="nav-link" href="index.php?controleur=personne&action=NewPersonne">New personne</a></li>
			<li ><a class="nav-link" href="index.php?controleur=personne&action=deconnexion">Déconnexion</a></li>
		</ul>	
		</div><!-- #navigation -->
	<?php
	}else{?>
		<div id="navigation" class="degardéCo">
		<div class="container">

			<ul class="navbar">
				<li ><a class="nav-link" href="index.php?controleur=personne&action=infoCompte">Mon compte</a></li>
				<li ><a class="nav-link" href="index.php?controleur=trajet&action=Voiture">Mes voitures</a></li>
	<li><a class="nav-link" href="index.php?controleur=trajet&action=proposition">Mes Propositions</a></li>
	<li><a class="nav-link" href="index.php?controleur=trajet&action=inscrire">Mes Inscriptions</a></li>
				<li ><a class="nav-link" href="index.php?controleur=trajet&action=listeTrajet">Liste trajet</a></li>
				<li ><a class="nav-link" href="index.php?controleur=trajet&action=Chercher">Chercher</a></li>	
				<li ><a class="nav-link" href="index.php?controleur=trajet&action=Proposer">Proposer</a></li>
				<li ><a class="nav-link" href="index.php?controleur=personne&action=deconnexion">Déconnexion</a></li>	
			</ul>	
		</div><!-- #navigation -->
	<?php
	}

}else if(isset($_SESSION['mdpoublie'])) //fin 1er if
		{
	?>	
		<div class="degardéCo"><!--Division pour le sommaire vide -->
		</div>
	</div><!--fin dégardeCo-->
	<?php
		unset($_SESSION['mdpoublie']);
		include("vues/personne/mdpoublie.php") ;
		}else{
	?>	
			<div><!--Division pour le sommaire vide -->
			</div>
	<?php
			include("vues/personne/connexion.php") ;
		}

?>


</div><!--fin inter-->