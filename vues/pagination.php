<?php
// Connexion à la base de données
require_once 'ModelPdo.php';
 
// Si tout va bien, on peut continuer
 
$nombre_de_msg_par_page=5; // On met dans une variable le nombre de messages qu'on veut par page
 
// On récupère le nombre total de messages
 
$reponse=$pdo->query('SELECT COUNT(*) AS contenu FROM trajet');
$total_messages = $reponse->fetch();
$nombre_messages=$total_messages['contenu'];
 
 
 
// on détermine le nombre de pages
$nb_pages = ceil($nombre_messages / $nombre_de_msg_par_page);
         
echo '<p align="center">'; //Pour l'affichage, on centre la liste des pages
if( $pageActuelle > 1) echo '<b><a href="voir_annonce.php?page='.$pageActuelle-1.'" style="color:#0000FF;" class="bouton_verts">Précedent</a></b>';
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
for ($i = 1 ; $i <= $nb_pages ; $i++)
{
    echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
}
if( $pageActuelle < $nombreDePage) echo '<b><a href="voir_annonce.php?page='.$pageActuelle+1.'" style="color:#0000FF;" class="bouton_verts">Suivant</a></b>';
echo '</p>';
?>
<div align="center">
 
<?php
 
 
 
// Maintenant, on va afficher les messages
// ---------------------------------------
 
if (isset($_GET['page']))
{
    $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse (livredor.php?page=4)
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
    $page = 1; // On se met sur la page 1 (par défaut)
}
 
// On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
$premierMessageAafficher = ($page - 1) * $nombre_de_msg_par_page;
 
// On ferme la requête avant d'en faire une autre
$reponse->closeCursor();
$reponse = null;
 
$reponse = $bdd->query('SELECT * FROM livreor ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $nombre_de_msg_par_page);
 
while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' .  stripslashes(htmlspecialchars($donnees['contenu'])) . '</p>';
}
 
$reponse->closeCursor();
$reponse = null;

?>