<div id="contenu">

	<form method="post" action="index.php?controleur=personne&action=NewPersonne">
		<table border="1" cellpadding="10" class="position_table">

			<tr><th>Nom</th><td><input type="text" name="nom"></td></tr>

			<tr><th>Prénom</th><td><input type="text" name="prenom"></td></tr>

			<tr><th>Email</th><td><input type="email" name="email"></td></tr> <!--ajouter vérification de l'adresse si elle existe déjà dans la BDD-->

			<tr><th>Date de naissance</th><td><input type="date" name="dateNaiss"></td></tr>

			<tr><th>Téléphone</th><td><input type="number" name="tel"></td></tr>

			<tr><th>Code Postal</th><td><input type="number" name="codeP"></td></tr>

			<tr><th>Ville</th><td><input type="text" name="ville"></td></tr>

			<tr><th>Statut</th>
				<td>
					<select name="statut">
						<option>Etudiant</option>
						<option>Personnel</option>
					</select>
				</td>
			</tr>
			<input hidden name="mdp" value="<?php echo ModelPersonne::aleamdp(); ?>"><!--ajouter création d'un mot de passe automatique et crypté-->


			<tr><th>admin</th>
				<td>				
					<select name="admin">
						<option>0</option>
						<option>1</option>
					</select>
				</td>
			</tr>

		
		</table>
		
		<td><input type="submit" value="valider"></td>
	
	</form>

</div>