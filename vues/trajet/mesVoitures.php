<?php
if (is_array ( $lignes[0]))
{
	
?>

<div id="contenu">
<table border="1" cellpadding="15" class="position_table">
<tr>
<th>marque</th>
<th>modele</th>
<th>couleur</th>
<th>immatriculation</th>
<th>distinction</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>

<?php
//liste des personnes
 


 
 foreach  ($ligne as $row) {
        echo "<tr><td><p><span class='nom'>".$row['marque']."</span></p></td>";
        echo "<td><p>".$row['modele']."</span></p></td>";
        echo "<td><p>".$row['couleur']."</span></p></td>";
        echo "<td><p>".$row['immatriculation']."</span></p></td>";
        echo "<td><p>".$row['distinction']."</span></p></td>";
        echo "<td><a href='index.php?controleur=trajet&idMod=".$row['idV']."&action=modifVoiture'><img src='vues/images/modif.jpg' width=50 height=50/></a></td>";
        echo "<td><a href='index.php?controleur=trajet&action=supprimerVoiture&idDel=".$row['idV']."'><img src='vues/images/delete.png' width=50 height=50/></a></td></tr>";

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
if( $pageActuelle >1) echo '<b><a href="index.php?controleur=trajet&page='.$PagePrecedente .'&action=precedent" >Précedent</a></b>';
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
for ($i = 1 ; $i <= $nbpage ; $i++)
{
    echo '<a href="index.php?controleur=trajet&action=numero&page=' . $i . '">' . $i . '</a> ';
}
if( $pageActuelle < $nbpage) echo '<b><a href="index.php?controleur=trajet&page='.$PageSuivante .'&action=suivant" >Suivant</a></b>';
echo '</p></td>';
echo"<a href='index.php?controleur=trajet&action=AddV'/>Ajouter une voiture</a>";
?>
<?php
}else{

?>
<p> aucune voiture enregistrée</p>
<td><a href='index.php?controleur=trajet&action=AddV'/>Ajouter une voiture</a></td>
<?php
}

?>
<div align="center">
 

</table>
</div>