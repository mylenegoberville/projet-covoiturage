<html>
	<form method="post" action="../../index.php?controleur=trajet&action=proposerTrajet">
		<table border="1" cellpadding="15" class="position_table">
			<tr><td>Départ : <input type="text" name="depart"></td></tr>
			<tr><td>Arrivée : <input type="text" name="arrivee"></td></tr>
			<tr><td>Date : <input type="date" name="date"></td></tr>
			<tr><td>Heure : <input type="time" name="heure"></td></tr>
			<tr><td>Nombre de place : 				
					<select name="place">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
					</select>
				</td></tr>

				<!--<td>Escale : <input type="text" name="escale"></td>!-->
				<tr><td>Voiture : 
<?php 
$v=count($lesVoitures);
					if($v>0){
						
?>				
					<select name="voiture">
					<?php
							foreach ($lesVoitures as $uneVoiture)
							{
								echo' <option value='.$uneVoiture[0].'>'.$uneVoiture[1].' | '.$uneVoiture[2].' | '.$uneVoiture[3].' | '.$uneVoiture[4].'</option>';
							}
					?>
					</select>
					<?php
					}else{
					?>
					<a href='index.php?controleur=trajet&action=AddV'/>Ajouter une voiture</a>
					<?php
					}
					?>
				</td>
			</tr>
			</table>
			<input type="submit" value="Proposer">
	</form>

</html>