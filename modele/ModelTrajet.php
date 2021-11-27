<?php
require_once 'ModelPdo.php';
class ModelTrajet extends ModelPdo {
//voiture
 public static function supprVoiture($id) {
   		try {
	   		$sql = "DELETE FROM voiture WHERE idV=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }
    public static function editVoiture($id,$marque,$modele,$couleur,$immatriculation,$distinction) {
   		try {
	   		$sql = "UPDATE voiture SET marque='$marque', modele='$modele',couleur='$couleur',immatriculation='$immatriculation',distinction='$distinction' WHERE idV=$id";
			$result=ModelPdo::$pdo->exec($sql);

   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }

 public static function getModifV($id) {
        try {
			$sql="SELECT  * FROM voiture where idV=$id ";
			$result=ModelPdo::$pdo->query($sql);
			$uneVoiture=$result->fetch();
			return $uneVoiture;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }
   	  
	public static function AjouterVoiture($id,$marque,$modele,$couleur,$immatriculation,$distinction) 
	{
		try {
			$sql =  "INSERT INTO voiture (marque,modele,couleur,immatriculation,distinction,idU) VALUE('".$marque."','".$modele."','".$couleur."','".$immatriculation."','".$distinction."',".$id.")";
			$result=ModelPdo::$pdo->exec($sql);
		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
	}	
	public static function getVoiture($id) 
	{
			$sql =  "select * from voiture WHERE idU=$id";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}
	public static function getVoitureP($id,$premierMessageAafficher,$nbligne) 
	{
			$sql =  "select * from voiture WHERE idU=$id LIMIT ". $premierMessageAafficher . "," . $nbligne." ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}

//trajet
public static function ajouterTrajet($id,$depart,$arrivee,$date,$heure,$place,$escale,$voiture) {
        try {		
			$sql="insert into trajet(depart,arrivee,date,heure,nbplaceP,nbplaceD,escale,idU,idV) VALUES ('".$depart."','".$arrivee."','".$date."','".$heure."',".$place .",".$place.",'".$escale."',".$id.",".$voiture.")";
			$result=ModelPdo::$pdo->exec($sql);	
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}	
   }
      public static function supprTrajet($id) {
   		try {
	   		$sql = "DELETE FROM trajet WHERE idT=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }
   public static function Annuler($id) {
   		try {
	   		$sql = "DELETE FROM transporter WHERE idT=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }  
   public static function decompte($id,$place) {
   		try {
			$nb=$place-1 ;
	   		$sql = "UPDATE trajet SET nbplaceD=$nb WHERE idT=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }   
   public static function recompte($id,$place) {
   		try {
			$nb=$place+1 ;
	   		$sql = "UPDATE trajet SET nbplaceD=$nb WHERE idT=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }
    public static function editTrajet($id,$depart,$arrivee,$date,$heure,$place, $escale, $voiture) {
   		try {
	   		$sql = "UPDATE trajet SET depart='$depart', arrivee='$arrivee',date='$date',heure='$heure',nbplacep=$place, nbplaceD=$place, escale='$escale', idV=$voiture WHERE idT=$id";
			$result=ModelPdo::$pdo->exec($sql);

   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }
   
  public static function getModifT($id) {
        try {
			$sql="SELECT  * FROM trajet where idT=$id ";
			$result=ModelPdo::$pdo->query($sql);
			$uneVoiture=$result->fetch();
			return $uneVoiture;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   } 
   public static function getProposition($id) 
	{
			$sql =  "select * from trajet WHERE idU=$id";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}       
	public static function getPropositionP($id,$premierMessageAafficher,$nbligne) 
	{
			$sql =  "select * from trajet WHERE idU=$id LIMIT ". $premierMessageAafficher . "," . $nbligne."";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}    
	public static function getInscrit($id) 
	{
			$sql =  "select transporter.idU, etat from trajet, transporter WHERE trajet.idT = transporter.idT AND trajet.idT=$id";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	} 	
	public static function getPassager($ligne) 
	{
			$sql =  "select * from utilisateurs  WHERE idU=$ligne";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetch();
			return $liste;
	} 
	public static function getInscrire($id) 
	{
			$sql =  "select * from transporter, trajet WHERE transporter.idT=trajet.idT AND transporter.idU=$id";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}
	public static function getInscrireP($id,$premierMessageAafficher,$nbligne)  
	{
			$sql =  "select * from transporter, trajet WHERE transporter.idT=trajet.idT AND transporter.idU=$id LIMIT ". $premierMessageAafficher . "," . $nbligne." ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}
	  public static function getAllTrajet($id) 
	{
			$sql =  "select * from trajet WHERE idU NOT IN (select idU from trajet WHERE idU=$id)";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	} 	  
	public static function getAllTrajetP($id,$premierMessageAafficher,$nbligne) 
	{
			$sql =  "select * from trajet WHERE idU NOT IN (select idU from trajet WHERE idU=$id) LIMIT ". $premierMessageAafficher . "," . $nbligne." ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}  
		public static function getValider($idv,$etat)
		{
			try {
	   		$sql = "UPDATE transporter SET etat='$etat' WHERE idT=$idv";
			$result=ModelPdo::$pdo->exec($sql);

   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
		}
		public static function getRefuser($idr,$etat)
		{
			try {
	   		$sql = "UPDATE transporter SET etat='$etat' WHERE idT=$idr";
			$result=ModelPdo::$pdo->exec($sql);

   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
		}
		
//la recherche  
  public static function getrecherche($depart, $arrivee, $date) 
	{
			$sql =  "select * from trajet WHERE depart='$depart' and arrivee='$arrivee' and date='$date' ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}
	public static function getrecherche1($depart, $arrivee) 
	{
			$sql =  "select * from trajet WHERE depart='$depart' and arrivee='$arrivee' ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}
	public static function getrecherche2($date) 
	{
			$sql =  "select * from trajet WHERE date='$date' ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}
//inscription
public static function inscription($idT,$id,$etat)
{
	
      try {		
			$sql= "insert into transporter(idT, idU, etat) VALUES (".$idT.",".$id.",'".$etat."')";
			$result=ModelPdo::$pdo->exec($sql);	
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}	
   }

	
}
?>