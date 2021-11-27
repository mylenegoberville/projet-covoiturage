<?php
if (is_array ( $lignes[0]))
{
?>

<div id="contenu">
<table border="1" cellpadding="15" class="position_table">
<tr>
<?php
 foreach  ($lignes as $row) {
	 $date1=$row['date'];
	 $dt= new DateTime();
	 $date2=$dt->format('Y-m-d');
		 if($date1>=$date2){
			 $c=0;
			 $c=$c+1;
			 
				 }
	 }
	 
  
  if($c==0){
	  echo "aucun trajet<br>";
	  echo "<a href='index.php?controleur=trajet&action=listeTrajet'/>Liste trajet</a>";
  }else{
	  
	?>
<th>Départ</th>
<th>Arrivée</th>
<th>Date</th>
<th>Heure</th>
<th>Place</th>
<!--<th>Escale</th>!-->
<th>Etat de la demande</th>
<th>Annulation</th>

</tr>

<?php
  }
//liste des personnes
 foreach  ($lignes as $row) {
	  $date1=$row['date'];
	 $dt= new DateTime();
	 $date2=$dt->format('Y-m-d');
		 if($date1>=$date2){
        echo "<tr><td><p><span class='nom'>".$row['depart']."</span></p></td>";
        echo "<td><p>".$row['arrivee']."</span></p></td>";
        echo "<td><p>".$row['date']."</span></p></td>";
        echo "<td><p>".$row['heure']."</span></p></td>";
        echo "<td><p>".$row['nbplaceD']."</span></p></td>";
       // echo "<td><p>".$row['escale']."</span></p></td>";
		echo "<td><p>".$row['etat']."</span></p></td>";
		if($row['etat']!='refuser'){
		echo "<td><a href='index.php?controleur=trajet&action=AnnulInscription&nbplaceD=".$row['nbplaceD']."&idA=".$row['idT']."'><img src='vues/images/annuler.jpg' width=50 height=50/></a></td>";
		}
		echo"</tr>";
		}
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
if( $pageActuelle >1) echo '<b><a href="index.php?controleur=trajet&page='.$PagePrecedente .'&action=precedent2" >Précedent</a></b>';
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
for ($i = 1 ; $i <= $nbpage ; $i++)
{
    echo '<a href="index.php?controleur=trajet&action=numero&page=' . $i . '">' . $i . '</a> ';
}
if( $pageActuelle < $nbpage) echo '<b><a href="index.php?controleur=trajet&page='.$PageSuivante .'&action=suivant2" >Suivant</a></b>';
echo '</p></td>';
  
?>
<?php
}else{

?>
<p> aucun trajet </p>
<td><a href='index.php?controleur=trajet&action=listeTrajet'/>Liste trajet</a></td>

<?php
}
?>
</table>
</div>