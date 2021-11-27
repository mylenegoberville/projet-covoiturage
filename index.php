<?php
session_start();
?>
<div id="global">

<?php
include("vues/entete.php") ;
//premiere ouverture = aucun controleur donc ignore le isset
include("vues/sommaire.php");
?>
</div>
<?php

if(isset($_REQUEST['controleur']))
		{
			$ctl = $_REQUEST['controleur'];
			switch ($ctl) {                  //test 
				
				case "personne" :{
					include 'controleur/ctlPersonne.php';
					break;
				}
				case "trajet" :{
					include 'controleur/ctlTrajet.php';
					break;
				}
				
			}	
		}
if (isset($_SESSION['msgerreur']))
{
	echo "<center>".$_SESSION['msgerreur']."</center>";
	unset($_SESSION['msgerreur']);
}
include("vues/pied.php") ;
?>
