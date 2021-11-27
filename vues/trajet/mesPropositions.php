<?php
if (is_array ( $lignes[0]))
{
	$V='valider';
	$R='refuser';
?>

<div id="contenu">
<table border="1" cellpadding="15" class="position_table">
<tr>
<th>Départ</th>
<th>Arrivée</th>
<th>Date</th>
<th>Heure</th>
<th>Place</th>
<!--<th>Escale</th>!-->
<th>Modifier</th>
<th>Supprimer</th>
<th>Inscrit</th>
</tr>

<?php
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
        echo "<td><a href='index.php?controleur=trajet&idMod=".$row['idT']."&action=modifTrajet'><img src='vues/images/modif.jpg' width=50 height=50/></a></td>";
        echo "<td><a href='index.php?controleur=trajet&action=supprimerTrajet&idDel=".$row['idT']."'><img src='vues/images/delete.png' width=50 height=50/></a></td>";
		
				$ligne = ModelTrajet::getInscrit($row['idT']);
		if (is_array($ligne)){
			for($i=0;$i<count($ligne);$i++){
				$passager = ModelTrajet::getPassager($ligne[$i][0]);
				if($ligne[$i]['etat']==$V){
				echo "<td><p><span class='nom'>".$passager['nom']."</span>";
				echo "&nbsp;".$passager['prenom']."</span></p>";
				//echo "<p><a href='mailto:".$passager['email']."?header:".$_SESSION['email']."'>".$passager['email']."</a></span></p>";
				echo "<p><a href='index.php?controleur=trajet&action=contact&idMail=".$passager['email']."&id=".$row['idT']."'>".$passager['email']."</a></span></p>";
				}else if($ligne[$i]['etat']==$R){
					
				}else{
				echo "<td><p><span class='nom'>".$passager['nom']."</span>";
				echo "&nbsp;".$passager['prenom']."</span></p>";
				echo "<a href='index.php?controleur=trajet&idV=".$row['idT']."&action=Valider'>Valider</a>";
				echo "&nbsp;<a href='index.php?controleur=trajet&idR=".$row['idT']."&action=Refuser'>Refuser</a></td>";}
			}
			}
echo "</tr>";
}
 }}
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
if( $pageActuelle >1) echo '<b><a href="index.php?controleur=trajet&page='.$PagePrecedente .'&action=precedent3" >Précedent</a></b>';
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
for ($i = 1 ; $i <= $nbpage ; $i++)
{
    echo '<a href="index.php?controleur=trajet&action=numero&page=' . $i . '">' . $i . '</a> ';
}
if( $pageActuelle < $nbpage) echo '<b><a href="index.php?controleur=trajet&page='.$PageSuivante .'&action=suivant3" >Suivant</a></b>';
echo '</p></td>';


?>
<?php
}else{

?>
<p> aucune trajet proposé</p>
<td><a href='index.php?controleur=trajet&action=Proposer'/>Proposer un trajet</a></td>

<?php
}
?>
</table>
</div>