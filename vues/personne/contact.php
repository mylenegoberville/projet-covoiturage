

<html>
	<body>
		<div class="container">
			<center><a class="taille">Contact</a></center>
			<hr>
		    <div id="contact">
				<center>
					<form class="form" action="index.php?controleur=trajet&action=contacter" method="post">
						<table class="table">
							<tr>
								<td><label for="courriel">Mail :</label></td>
								<td><input class=" form-control" type="email"  name="email" value="<?php echo $id ;?>"></td>
							</tr>
							<tr>
								<td><label for="objet">Objet :</label></td>
						    	<td><input class=" form-control" type="text" name="objet" value="<?php if(isset($sujet)){echo $sujet;}?>"></td>
							</tr>
							<tr>
								<td><label for="message">Message :</label></td>
								<td><textarea class=" form-control"  name="message"><?php if(isset($message)){echo $message;}?></textarea></td>
							</tr>
						</table>
									<input type="hidden" name="code" value="<?php echo $expediteur ?>">  	
					  	<center><button type="submit" name="mailform">Envoyer</button></center>
						<?php
							if(isset($msg))
							{
								echo $msg;
							}
						?>
					</form>
				</center>		
	
	</body>