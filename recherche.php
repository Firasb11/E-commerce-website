<?php include_once("../connect.inc.php") ?>
<?php include_once("entent.html") ?>
   
        <?php
    
       // recuperation de saisie faite par le formulaire
                $recherche = $_POST['recherche'];
                $categorie = $_POST['categorie'];
                $choix = $_POST['verif'];

  
        

                 ?>
                 <h2>Article dans ton Recherche <p  class="text-white">"<?php echo  $categorie ; ?>"</p></h2>
                  
                 <?php 
                 //création de la requete mysql
                 if (($categorie != 'Toutes') && ($choix == 'prix')){
                 $sql = "SELECT * FROM Article where categorie LIKE '$categorie' ORDER BY prix DESC";
                 }
                 if (($categorie != 'Toutes') && ($choix == 'marque')){
                    $sql = "SELECT * FROM Article where categorie LIKE '$categorie'  ORDER BY designation ";
                    }
                 if (($categorie == 'Toutes') && ($choix == 'prix')){
                 $sql = "SELECT * FROM Article ORDER BY prix DESC ";
                 
                 }
                 if (($categorie == 'Toutes') && ($choix == 'marque')){
                    $sql = "SELECT * FROM Article ORDER BY designation  ";
                    
                    }
                 
                 $res = mysqli_query($conn, $sql);
                
                 
                 if ($res == TRUE){
                     $count = mysqli_num_rows($res);
                 }
               
                 // verifier le nombre des lignes  
                 if ($count > 0){
                     while($rows = mysqli_fetch_assoc($res))
                     {
                        $id_article = $rows['id_article'];
                        $categorie = $rows['categorie'];
                         $designation = $rows['designation'];
                         $prix = $rows['prix'];
                         $categorie = $rows['categorie'];
                         $nom_image = $rows['nom_image'];
                    


                   ?>
      
    
    <!-- Recherche fini ici -->

 <!-- Header -->
 <header>
 
   </header>
  <!-- Fin du header -->
  
  <!-- Section principale -->
  <section class="main">
    
    <!-- Toutes les cartes -->
    
    <div class="cards">
      
      <div class="card">
      <?php if ($nom_image ==""){
                        echo "<div class='btn-danger'>  image not available</div>"; }
                       
                
                     ?>
    
                  <img src="<?php siteurl ; ?>images/<?php echo $nom_image ; ?>"/>
        <div class="card-header">
          <h4 class="title"><?php echo $designation ; ?></h4>


        </div>
        <p class="price"><?php echo $prix."€"; ?></p>
        <div class="card-body">
          <p><?php echo $categorie ; ?> </p>
        </div>
      </div>
     
      
     </div>
     <?php 
      $_SESSION['id'] = array(); ?>
      <form action="panier.php" method="GET">
      <div style="display: block"class="order-label">Quantité</div>
                          <input type="number" name="quantité" class="input-responsive" value="1" required>
                          <input type="hidden" name="id" value="<?php echo $id_article ; ?>"></input>
                         
                        <button class="btn btn-primary ">commander</button>
                    </div> 
                    <br><br>
                      </form>
     <?php   }}?>

                    
    <!-- Fin de toutes les cartes -->
    
   
  <!-- Fin de la section principale -->
  

</body>
</html>
<?if(isset($_GET['commander'])){
$_SESSION['id'][$id_article] = $id_article;
}


<?php include_once("pied.html");?>

  
    
    <!-- fin affichage -->
