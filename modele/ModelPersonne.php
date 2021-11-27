<?php
require_once 'ModelPdo.php';
class ModelPersonne extends ModelPdo {
	
   public static function getListePersonne() {
        try {
			$sql="SELECT  * FROM utilisateurs ";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }

   public static function getAllPersonne() 
	{
			$sql =  "select * from utilisateurs";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			return $liste;
	}

  public static function getPersonne($id) {
        try {
			$sql="SELECT  * FROM utilisateurs where idU=$id ";
			$result=ModelPdo::$pdo->query($sql);
			$unePersonne=$result->fetch();
			return $unePersonne;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }
    public static function getMail($mail) {
        try {
			$sql="SELECT  * FROM utilisateurs where email='$mail'";
			$result=ModelPdo::$pdo->query($sql);
			$unePersonne=$result->fetch();
			return $unePersonne;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }  
   public static function getidConducteur($idT) {
        try {
			$sql="SELECT  idU FROM trajet where  idT=$idT";
			$result=ModelPdo::$pdo->query($sql);
			$unePersonne=$result->fetch();
			return $unePersonne;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}		
   }
	public static function recupinfo($id) {
        try {
      $sql="SELECT  * FROM utilisateurs where idU='$id'";
      $result=ModelPdo::$pdo->query($sql);
      $unePersonne=$result->fetch();
      return $unePersonne;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
          }   
   }

   public static function ajouterPersonne($nom,$prenom,$email,$dateNaiss,$tel,$codeP,$ville,$statut,$admin,$mdp) {
        try {
          $mdpHASH=password_hash($mdp,PASSWORD_DEFAULT);
          $sql="insert into utilisateurs(nom,prenom,email,dateNaiss,telephone,code_Postal,ville,statut,admin,mdp) VALUES ('".$nom."','".$prenom."','".$email."','".$dateNaiss."',".$tel.",".$codeP.",'".$ville."','".$statut."',".$admin.",'".$mdpHASH."')";
  			  $result=ModelPdo::$pdo->exec($sql);	
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        	}	
   }

   public static function supprPersonne($id) {
   		try {
	   		$sql = "DELETE FROM utilisateurs WHERE idU=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }

 public static function editPersonne($id, $nom, $prenom,$email,$tel,$codeP,$ville,$admin) {
   		try {
	   		$sql = "UPDATE utilisateurs SET nom='$nom', prenom='$prenom',email='$email',telephone=$tel,code_Postal=$codeP,ville='$ville',admin=$admin WHERE idU=$id";
	   		$result=ModelPdo::$pdo->exec($sql);
   		} catch (PDOException $e) {
	   		echo $e->getMessage();
	   		die("Erreur dans la BDD");
   			}
   }

  public static function getLoginPers($email) {
      try {
          $sql="SELECT * FROM utilisateurs where email='$email'";
         // $verif =$sql->;    //password_verify($_POST['mdp'],$testmdp)
          $result=ModelPdo::$pdo->query($sql);
          $unePersonne=$result->fetch();
          return $unePersonne;
      } catch (PDOException $e) {
         echo $e->getMessage();
         die("Erreur dans la BDD ");
      }   
   }

  public static function aleamdp(){
    $baseliste = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $aleamdp = '';
    $spe= '!#$%&"()*+,-./:;<=>?@[]^_`{|}~';
    $taille=8;

    for($i=0; $i<$taille; $i++){
      $aleamdp.= $baseliste[rand(0, strlen($baseliste)-1)];
    }
    $aleamdp[rand(0, strlen($aleamdp)-1)] = $spe[rand(0, strlen($spe)-1)];  
    
    return $aleamdp;
  }

  public static function newmdp($email,$newmdp)
  {
    try{
      $mdpHASH=password_hash($newmdp,PASSWORD_DEFAULT);
      $mod="UPDATE utilisateurs SET mdp='$mdpHASH' WHERE email = '$email' ";
      $result=ModelPdo::$pdo->exec($mod);
    }catch (PDOException $e) {
        echo $e->getMessage();
        die("Erreur dans la BDD");
    }

  }

  public static function editCompte($email,$tel,$codep,$ville)
  {
    try{
      $modcompte="UPDATE utilisateurs SET telephone=$tel,code_Postal=$codep,ville='$ville' WHERE email = '$email'";
      $result=ModelPdo::$pdo->exec($modcompte);
    }catch (PDOException $e) {
        echo $e->getMessage();
        die("Erreur dans la BDD");
    }


  }



}//fin modelPersonne


?>