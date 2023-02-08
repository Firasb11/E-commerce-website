<?php include_once("../connect.inc.php") ?>
<?php include_once("entent.html") ?>

<body>
  <!-- Barre de navigation -->
  <nav>
    <h1>Electruh</h1>
    <div class="onglets">
      <p class="link">Home</p>
      <p class="link">Categories</p>
      <p class="link">Explore</p>
      <div class="icon"><i class="fas fa-shopping-cart"></i></p></div>
      <p class="link">panel</p>

      <p class="link">contact us</p>
      <form action= "<?php siteurl ; ?>recherche.php" method="POST">
        <input type="search" name="recherche" placeholder="Rechercher">
        <label for="select" >Catégorie:</label>
<select name="categorie">
       <option value="Toutes">Toutes</option>
       <option value="Videos">Vidéos</option>
       <option value="photo">photo</option>
       <option value="Informatique">Informatique</option>
       <option value="Téléphonie">Téléphonie</option>
       <option value="Divers">Divers</option>
  
 </select>
  <input type="radio" name="verif"  value="marque"
         checked>  marque
  <input type="radio"  name="verif" value="prix">prix

<input class="btn" type="submit" value="OK">  
      </form>
      
      
    </div>
  </nav>
  <!-- Fin de la barre de navigation -->
  
  <!-- Header -->
   <header>
     <h1>C'est votre boutique, votre chez-vous.</h1>
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
    <!-- Toutes les cartes -->
    
    <div class="cards">
   <!--
      <div class="card">
        <img src="https://static.nike.com/a/images/f_auto/q_auto:eco/t_PDP_864_v1/0697fd03-09fd-4b3b-be0b-11b009c671d9/short-en-molleton-sportswear-pour-z5Kgjx.jpg">
        <div class="card-header">
          <h4 class="title">Short Nike</h4>
          <h4 class="price">199$</h4>
        </div>
        <div class="card-body">
          <p>Short moulant pour homme</p>
        </div>
      </div>
      
      <div class="card">
        <img src="https://static.nike.com/a/images/f_auto/q_auto:eco/t_PDP_864_v1/eric5lwitzffpoisq0rj/chaussure-blazer-mid-77-vintage-pour-pMfjs8.jpg">
        <div class="card-header">
          <h4 class="title">Paire de chaussures stylées</h4>
          <h4 class="price">69$</h4>
        </div>
        <div class="card-body">
          <p>Des paires de chaussures stylées pour femme</p>
        </div>
      </div>
      
      <div class="card">
        <img class="j1"src="https://static.nike.com/a/images/f_auto/q_auto:eco/t_PDP_864_v1/abb537eb-0e70-4e1f-903e-ec46b8657c0d/short-de-training-en-tissu-fleece-dri-fit-pour-n97b2F.jpg">
        <div class="card-header">
          <h4 class="title">Short pour courir</h4>
          <h4 class="price">39$</h4>
        </div>
        <div class="card-body">
          <p>Sport pour courir en plain air pour homme</p>
        </div>
      </div>
      
     </div>
    Fin de toutes les cartes -->
    
    
    
    
   
  <!-- Fin de la section principale -->
  

</body>
</html>
<?php include_once("pied.html");?>