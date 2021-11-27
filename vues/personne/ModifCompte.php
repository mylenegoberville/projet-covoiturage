<div id="contenu">	
	<form method="post" action="index.php?controleur=personne&action=modifCompte">
		<table border="1" cellpadding="15" class="position_table">
			<tr>
				<td>Email : </td><td><input type="email" name="email" value="<?php echo $info['email']; ?>"></td>
			</tr>
			<tr>
				<td>Téléphone : </td><td><input type="tel" name="tel" value="<?php echo $info['telephone']; ?>"></td>
			</tr>
			<tr>
				<td>Code Postal : </td><td><input type="tel" name="codep" value="<?php echo $info['code_Postal']; ?>"></td>
			</tr>
			<tr>
				<td>Ville : </td><td><input type="text" name="ville" value="<?php echo $info['ville']; ?>"></td>
			</tr>

			
			<tr>
				<td><input type="submit" value="Mettre à jour mon compte"></td>
				<td><a href="index.php?controleur=personne&action=infoCompte">Retour</a></td>
			</tr>
		</table>
	</form>

</div>