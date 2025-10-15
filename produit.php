<?php



require_once("config/connexion.php");
require_once("config/commandes.php");

$produit_principal = null;
$produits_similaires = [];
$id = null;

if(isset($_GET['pdt']) && is_numeric($_GET['pdt']))
{
    $id = $_GET['pdt'];
    
    // 1. Récupérer le produit principal (celui qui est cliqué)
    $produit_principal = getUnProduit($id); 

    if($produit_principal){
        // 2. Récupérer les produits similaires (4 au hasard, différents du principal)
        $produits_similaires = getProduitsSimilaires($id, 4);
    }
} else {
    // Rediriger ou gérer l'erreur si aucun ID n'est fourni
    header('Location: index.php');
    exit();
}



?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.80.0">
<title>OptiStore</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<style>

header{
    position: sticky;
    top: 0;
    z-index: 1000;
  }

.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
.bd-placeholder-img-lg {
    font-size: 3.5rem;
}
}


#footer{
    background-color: #212529;
    padding: 20px;
}

.footer{
   display: flex;
   justify-content: space-between;
   flex-wrap: wrap;
   gap: 30px;
   color: #ddd;
   font-size: 15px;
   
}

.footer h3{
    text-transform: uppercase;
    margin-bottom: 10px;
    font-weight: bold;
}


.send input{
    padding: 15px;
    border: none;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 30px;
    float: left;
}

.send button{
    padding: 15px;
    border: none;
    border-top-right-radius: 30px;
    background-color: green;
    color: #ddd;
    font-weight: bold;
    font-size: 14px;

}

.icons{
    text-decoration: none;
    color: white;
    text-align: center;
}
.icons ion-icon{
    color: #fff;
    font-size: 20px;
    padding-left: 14px;
    padding-top: 5px;
    transition: 0.3s ease;
}
.icons ion-icon:hover{
    color: #b4c929;;

}


</style>


</head>
<body>

<header>
<div class="collapse bg-dark" id="navbarHeader">
<div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
    </div>
    <div class="col-sm-4 offset-md-1 py-4">
        <ul class="list-unstyled">
        <li><a href="login.php" class="text-white">Se connecter</a></li>
        </ul>
    </div>
    </div>
</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
<div class="container">
    <a href="#" class="navbar-brand d-flex align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
    <strong>OptiStore</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
</div>
</div>
</header>

<main>

<div class="album py-5 bg-light">

<a href="index.php"><button type="button" class="btn btn-sm btn-success">Retour</button></a>
<div class="container" style="display: flex; justify-content: center">

    <div class="row">
<div class="col-md-2"></div>
<?php foreach($Produits as $produit){ if($produit->id == $id){ ?> 
        <div class="col-md-8">
            <div class="card shadow-sm" >
             
                <img src="<?= $produit->image ?>" style="width: 100%">
                   <h3 align="center"><?= $produit->nom ?></h3>

                <div class="card-body">
                <p class="card-text"><?= $produit->description ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm btn-success">Commander</button></a>
                    </div>
                    <small class="text" style="font-weight: bold;"><?= $produit->prix ?> CFA</small>
                </div>
                </div>
            </div>
            </div>
<?php }} ?>

<div class="col-md-2"></div>
    </div>
</div>
</div>

<?php if (count($produits_similaires) > 0) { ?>
<div class="container mt-5">
    <h3 class="mb-4 text-center">Produits Similaires</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        
        <?php foreach($produits_similaires as $similaire) { ?>
        <div class="col">
            <div class="card shadow-sm">
                <img src="<?= $similaire->image ?>" style="width: 100%; height: 200px; object-fit: cover;" class="card-img-top">
                
                <div class="card-body">
                    <h5 class="card-title"><?= $similaire->nom ?></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="produit.php?pdt=<?= $similaire->id ?>" class="btn btn-sm btn-outline-secondary">Voir</a>
                        </div>
                        <small class="text-muted"><?= $similaire->prix ?> CFA</small>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>
<?php } ?>



</main>
<br>
<br>

<section id="footer">
  <div class="footer">

    
    <div class="heure">
      <h3>Jours </h3>
      <p>Lundi-vendredi   </p>
      <p>Samedi </p>
      <p>Dimanche </p>
    </div>
    <div class="heure">
      <h3>  Heures</h3>
      <p>   08h - 23h</p>
      <p> 10h - 21h</p>
      <p> 13h - 23h</p>
    </div>
    <div class="promo">
      <h3>Live Days</h3>
      <p>Lundi 09h - 11h</p>
      <p>Vendredi 20h - 22h</p>
      
    </div>
    <div class=" send">
      <h3>envoyer un avis</h3>
      <input type="text"  placeholder="laissé un avis" >
      <button>Envoyer</button>
    </div>
  </div>
            
    <div class="icons">
      <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
      <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
      <a href=""><ion-icon name="logo-google"></ion-icon></a>
      <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
      <a href=""><ion-icon name="logo-Tiktok"></ion-icon></a>
      <a href="https://wa.me/22897324256"><ion-icon name="logo-whatsApp"></ion-icon></a>
    </div>
            
</section>

</body>
</html>
