<?php

require_once("config/connexion.php"); 
require_once("config/commandes.php"); 

$Produits = afficher();

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
      <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<style>

  header{
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  body{
    font-family: Arial, Helvetica, sans-serif;
    background-color: #fff;
  }

  .card shadow-sm:focus{
    box-shadow:  4px 4px 4px 4px greenyellow;
  }

  .produit-vignette {
    width: 50%; 
    height: auto; /* Maintient le ratio */
    object-fit: cover;
    display: block; /* Aide à centrer si nécessaire */
    margin: 0 auto; /* Optionnel : pour centrer l'image si elle est dans un bloc */
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
    background-color:green;
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
    
<header >
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-white">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
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
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php foreach($Produits as $produit): ?> 
        <div class="col">
          <div class="card shadow-sm">
            
            <img src="<?= $produit->image ?>" class="produit-vignette">
            <h3 align="center"><?= $produit->nom ?></h3>

            <div class="card-body">
               <p class="card-text"><?= substr($produit->description, 0, 160); ?>...</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm btn-success">Voir plus</button></a>
                </div>
                <small class="text" style="font-weight: bold;"><?= $produit->prix ?> CFA</small>
              </div>
            </div>
          </div>
        </div>
  <?php endforeach; ?>


      </div>
    </div>
  </div>

</main>


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