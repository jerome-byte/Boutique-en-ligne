<?php

 

function modifier($image, $nom, $prix, $desc, $id)
{
  global $pdo; 
 
    $req = $pdo->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }

function afficherUnProduit($id)
{
  global $pdo; 
	
		$req=$pdo->prepare("SELECT * FROM produits WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}


  function ajouter($image, $nom, $prix, $desc)
  { global $pdo; 
    
      $req = $pdo->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

      $req->execute(array($image, $nom, $prix, $desc));

      $req->closeCursor();
    }
  

function afficher()
{ global $pdo; 

		$req=$pdo->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}


function supprimer($id)
{
  global $pdo; 
	
		$req=$pdo->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}


function getAdmin($email, $password){
  
  global $pdo; 
  

    $req = $pdo->prepare("SELECT * FROM admin WHERE id=77");

    $req->execute();

    if($req->rowCount() == 1){
      
      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

  // Nouvelle fonction pour récupérer UN produit par son ID
function getUnProduit($id)
{
    if (require("connexion.php")) {
      global $pdo; 
        $req = $pdo->prepare("SELECT * FROM produits WHERE id=?");
        $req->execute(array($id));

        if ($req->rowCount() == 1) {
            return $req->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }
}

// Nouvelle fonction pour récupérer des produits SIMILAIRES
function getProduitsSimilaires($current_id, $limit = 4)
{
    if (require("connexion.php")) {
      global $pdo; 
        // Exclut le produit actuellement affiché (id != ?)
        // Et prend un nombre limité de produits (LIMIT)
        $req = $pdo->prepare("SELECT * FROM produits WHERE id != ? ORDER BY RAND() LIMIT ?");
        $req->bindParam(1, $current_id, PDO::PARAM_INT);
        $req->bindParam(2, $limit, PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}



?>