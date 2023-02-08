

<?php include('../connect.inc.php'); ?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title>connexion</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="login-admin.css"/>
  </head>
  <body>
<div class="login-box">
<br><br><br><br>
  <?php if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }?>
             <?php if(isset($_SESSION['no-login'])){
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- titre -->
    <h2 class="active"> connexion </h2>

   
    <!-- formulaire -->
    <form  action="" method="POST"> 
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="nom" name="nom">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="motdepasse">
  </div>

  <input type="submit" name="submit" class="btn" value="connexion">
</div>
</form>
  </body>
</html>
<?php 
  if(isset($_POST['submit'])){
     $nom = $_POST['nom'];
        $mdp = $_POST['motdepasse'];
   
      $sql = "SELECT * FROM tbl_admin WHERE nom = '$nom' AND mot_de_passe = '$mdp'";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
     

      if ($count == 1){
        $_SESSION['login']="<div   class='btn-success p-2'>connexion succée</div>";
        $_SESSION['admin']=$nom;
        header('location:'.siteurl."admin/gestion_article.php");

  }
  
  if ($count == 0){
    $_SESSION['admin']="<div class='btn-danger p-2'>incorrect nom ou mot de passe</div>";
    header('location:'.siteurl."admin/connexion-admin.php");

}}
  ?>