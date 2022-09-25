<?php

function getAdmin($email, $motdepasse)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?");

    $req->execute(array($email, $motdepasse));

    if($req->rowCount() == 1) {

      $data =$req -> fetch();

      return $data;
    }else{
      return false;
    }

    $req->closeCursor();
  }
}

function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE book SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}


function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM book WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function ajouter($image, $nom, $prix, $desc)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO book (image, nom, prix, description) VALUES (?, ?, ?, ?)");

    $req->execute(array($image, $nom, $prix, $desc));

    $req->closeCursor();
  }
}

function afficher()
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM book ORDER BY id DESC");

        $req-> execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
    }
}

function supprimer($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM book WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}

function achat($nom, $email, $number, $quantite)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO achat (nom, email, number, quantite) VALUES (?, ?, ?, ?)");

    $req->execute(array($nom, $email, $number, $quantite));

    $req->closeCursor();
  }
}

function inscription($email, $password, $number)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO user (email, password, number) VALUES (?, ?, ?)");

    $req->execute(array($email, $password, $number));

    $req->closeCursor();
  }
}
?>