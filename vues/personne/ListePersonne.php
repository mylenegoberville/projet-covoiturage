<div id="contenu">
<table border="1" cellpadding="15" class="position_table">
<tr>
<th>Nom</th>
<th>Prénom</th>
<th>Email</th>
<th>Téléphone</th>
<th>Code Postal</th>
<th>Ville</th>
<th>Statut</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>

<?php
//liste des personnes
 foreach  ($lignes as $row) {
        echo "<tr><td><p><span class='nom'>".$row['nom']."</span></p></td>";
        echo "<td><p>".$row['prenom']."</span></p></td>";
        echo "<td><p>".$row['email']."</span></p></td>";
        echo "<td><p>".$row['telephone']."</span></p></td>";
        echo "<td><p>".$row['code_Postal']."</span></p></td>";
        echo "<td><p>".$row['ville']."</span></p></td>";
        echo "<td><p>".$row['statut']."</span></p></td>";
        echo "<td><a href='index.php?controleur=personne&idMod=".$row['idU']."&action=modifPersonne'><img src='vues/images/modif.jpg' width=50 height=50/></a></td>";
        echo "<td><a href='index.php?controleur=personne&idDel=".$row['idU']."&action=supprimerPersonne'><img src='vues/images/delete.png' width=50 height=50/></a></td></tr>";

  }
?>
</table>
</div>