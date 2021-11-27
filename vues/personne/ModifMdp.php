<div id="contenu">	
	<form method="post" action="index.php?controleur=personne&action=modifMdp">
		<table border="1" cellpadding="15" class="position_table">

			<input type="hidden" name="email" value="<?php echo $info['email']; ?>">
			<tr>
				<td>Ancien mot de passe : </td><td><input type="password" name="Amdp"></td>
			</tr>
			<tr>
				<td>Nouveau mot de passe : </td><td><input type="password" name="Nmdp"></td>
			</tr>
			<tr>
				<td>Confirmation de mot de passe : </td><td><input type="password" name="Cmdp"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Changer mon mot de passe"></td>
				<td><a href="index.php?controleur=personne&action=infoCompte">Retour</a></td>
			</tr>
		</table>
	</form>

</div>