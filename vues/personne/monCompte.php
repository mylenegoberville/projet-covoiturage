<div id="contenu">
		<table border="1" cellpadding="15" class="position_table">
			<tr>
				<td>Nom :</td><td><input type="text" name="nom" value="<?php echo $info['nom']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Prénom :</td><td><input type="text" name="prenom" value="<?php echo $info['prenom']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Email :</td><td><input type="email" name="email" value="<?php echo $info['email']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Date de naissance :</td><td><input type="date" name="datenaiss" value="<?php echo $info['dateNaiss']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Téléphone :</td><td><input type="number" name="tel" value="<?php echo $info['telephone']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Code Postal :</td><td><input type="number" name="codep" value="<?php echo $info['code_Postal']; ?>" readonly></td>
			</tr>
			<tr>
				<td>Ville :</td><td><input type="text" name="ville" value="<?php echo $info['ville']; ?>" readonly></td>
			</tr>
			<tr>
				<td><a href="index.php?controleur=personne&action=MCompte">Modifier mon compte</a>
				<br><a href="index.php?controleur=personne&action=Mmdp">Modifier mon mot de passe</a></td>
				
				<td><a href="index.php?controleur=trajet&action=AddV">Ajouter voiture</a></td>
				</td>
			</tr>
		</table>

</div>
