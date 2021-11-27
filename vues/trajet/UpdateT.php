<html>
	<body>
		<form method='post' action='index.php?controleur=trajet&action=modifTrajet'>
			<table border='1' cellpadding='10' class="position_table">
				<tr>
					<td><label>Départ :</label></td>
					<td><input type=text name="depart" value="<?php echo $ligne['depart'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Arrivée :</label></td>
					<td><input type=text name="arrivee" value="<?php echo $ligne['arrivee'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Date :</label></td>
					<td><input type=text name="date" value="<?php echo $ligne['date'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Heure :</label></td>
					<td><input type=text name="heure" value="<?php echo $ligne['heure'] ;?>"></td>
				</tr>
				<tr>
					<td><label>Place :</label></td>
					<td><input type=text name="place" value="<?php echo $ligne['nbplaceP']; ?>"></td>
				</tr>
				<!--<tr>
					<td><label>Escale :</label></td>
					<td><input type=text name="escale" value="<?php echo $ligne['escale'] ;?>"></td>
				</tr>!-->
				<tr>
					<td>Voiture : </td>		<td>
					<select name="voiture" value="<?php echo $ligne[9];?>">
					<?php
						foreach ($lesVoitures as $uneVoiture)
						{
							echo' <option value='.$uneVoiture[0].'>'.$uneVoiture[1].' | '.$uneVoiture[2].' | '.$uneVoiture[3].' | '.$uneVoiture[4].'</option>';
						}
					?>
					</select>
				</td>
				</tr>

				<input type="hidden" name="code" value="<?php echo $id ?>">
				<tr><td><input type=submit name="valider" value="Modifier"></td></tr>

			</table>
		</form>
	</body>
</html>


