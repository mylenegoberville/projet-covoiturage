	<div id="contenu">
<table border="1" cellpadding="15" class="position_table">
<tr>
<?php
 foreach  ($lignes as $row) {
	 $date1=$row['date'];
	 $dt= new DateTime();
	 $date2=$dt->format('Y-m-d');
	 if($row['nbplaceD']>0 ){
		 if($date1>=$date2){
			 $c=0;
			 $c=$c+1;
			 
				 }
	 }
	 
  }
  
  if($c==0){
  }else{
	  
	?>
<th>Départ</th>
<th>Arrivée</th>
<th>Date</th>
<th>Heure</th>
<th>Place</th>
<!--<th>Escale</th>!-->
<th>S'inscrire</th>
</tr>

<?php
}


//liste des personnes
 foreach  ($lignes as $row) {
	 $date1=$row['date'];
	 $dt= new DateTime();
	 $date2=$dt->format('Y-m-d');
	 if($row['nbplaceD']>0 ){
		 if($date1>=$date2){
				echo "<tr><td><p><span class='nom'>".$row['depart']."</span></p></td>";
				echo "<td><p>".$row['arrivee']."</span></p></td>";
				echo "<td><p>".$row['date']."</span></p></td>";
				echo "<td><p>".$row['heure']."</span></p></td>";
				echo "<td><p>".$row['nbplaceD']."</span></p></td>";
				//echo "<td><p>".$row['escale']."</span></p></td>";
				echo "<td><a href='index.php?controleur=trajet&action=inscription&nbplaceD=".$row['nbplaceD']."&idI=".$row['idT']."'><img src='vues/images/inscription.jpg' width=50 height=50/></a></td></tr>";
		 }
	 }
	 
  }

 if ($c==0){
	echo" aucun trajet trouvé ou inéxistant"; 
 }
echo "<td>";  
if (isset($_GET['page']))
{
    $pageActuelle = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livredor.php?page=4)
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
    $pageActuelle = 1; // On se met sur la page 1 (par défaut)
}
$PagePrecedente= $pageActuelle-1; 
$PageSuivante =$pageActuelle+1;
echo '<p align="center">'; //Pour l'affichage, on centre la liste des pages
if( $pageActuelle >1) echo '<b><a href="index.php?controleur=trajet&page='.$PagePrecedente .'&action=precedent1" >Précedent</a></b>';
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
for ($i = 1 ; $i <= $nbpage ; $i++)
{
    echo '<a href="index.php?controleur=trajet&action=numero&page=' . $i . '">' . $i . '</a> ';
}
if( $pageActuelle < $nbpage) echo '<b><a href="index.php?controleur=trajet&page='.$PageSuivante .'&action=suivant1" >Suivant</a></b>';
echo '</p></td>';
 
?>
</table>
</div>