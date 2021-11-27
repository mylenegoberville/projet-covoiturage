<html>
	<body>
		<form method='post' action='index.php?controleur=trajet&action=modifVoiture'>
			<table border='1' cellpadding='10' class="position_table">
				<tr>
					<td><label>marque :</label></td>
					<td><input type=text name="marque" value="<?php echo $ligne['marque'] ;?>"></td>
				</tr>
				<tr>
					<td><label>modele :</label></td>
					<td><input type=text name="modele" value="<?php echo $ligne['modele'] ;?>"></td>
				</tr>
				<tr>
					<td><label>couleur :</label></td>
					<td><input type=text name="couleur" value="<?php echo $ligne['couleur'] ;?>"></td>
				</tr>
				<tr>
					<td><label>immatriculation :</label></td>
					<td><input type=text name="immatriculation" value="<?php echo $ligne['immatriculation'] ;?>"></td>
				</tr>
				<tr>
					<td><label>distinction :</label></td>
					<td><input type=text name="distinction" value="<?php echo $ligne['distinction']; ?>"></td>
				</tr>
			

				<input type="hidden" name="code" value="<?php echo $id ?>">
				<tr><td><input type=submit name="valider" value="Modifier"></td></tr>

			</table>
		</form>
	</body>
</html>
