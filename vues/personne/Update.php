<html>
	<body>
		<form method='post' action='index.php?controleur=personne&action=modifPersonne'>
			<table border='1' cellpadding='10' class="position_table">
				<tr>
					<td><label>Nom :</label></td>
					<td><input type=text name="nom" value="<?php echo $ligne['nom'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Prénom :</label></td>
					<td><input type=text name="prenom" value="<?php echo $ligne['prenom'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Email :</label></td>
					<td><input type=email name="email" value="<?php echo $ligne['email'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Téléphone :</label></td>
					<td><input type=number name="tel" value="<?php echo $ligne['telephone'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Code Postal :</label></td>
					<td><input type=number name="codeP" value="<?php echo $ligne['code_Postal']; ?>"></td>
				</tr>
				<tr>
					<td><label>Ville :</label></td>
					<td><input type=text name="ville" value="<?php echo $ligne['ville'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Administrateur :</label></td>
					<td><input type=text name="admin" value="<?php echo $ligne['admin'] ;?>"></td>
				</tr>

				<input type="hidden" name="code" value="<?php echo $id ?>">
				<tr><td><input type=submit name="valider" value="Modifier"></td></tr>

			</table>
		</form>
	</body>
</html>


