<?php include('../connect.inc.php'); 
include('connexion-admin-check.php');
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Electruh</title>
        <link rel="stylesheet" href="../css/admin.css"/>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    </head>
    <body>
        <div class="menu">
    <div class="wrapper" >
         <ul class="text-center">
             <Li><a href="gestion_article.php">Gestion des articles</a></li>
            <li><a href="déconnexion.php">Déconnecter</a></li>
         </ul>
    </div>
        </div>




<div class="main-content">
        <div class="wrapper" >
            <h1>Gestion Article</h1>
            <br><br>
            <?php if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }?>
            <?php if(isset($_SESSION['ajoute_succ'])){
                echo $_SESSION['ajoute_succ'];
                unset($_SESSION['ajoute_succ']);
            }?>
                <?php if(isset($_SESSION['supprimer'])){
                echo $_SESSION['supprimer'];
                unset($_SESSION['supprimer']);
            }?>
                <?php if(isset($_SESSION['modifier_succ'])){
                echo $_SESSION['modifier_succ'];
                unset($_SESSION['modifier_succ']);
            }?>
           
            <br> <br>
           <!--button to add admin -->
           <a href="ajoute_article.php" class="btn-primary text-decoration-none p-2">Ajouter Article</a>
           <br> 
           <br>
           <br>
             <table class="tbl-full">
            <tr>
                <th>id_article</th>
                <th>Designation</th>
                <th>catégorie</th>
                <th>prix</th>
                <th>Action</th>
            </tr>
            <?php 
            $sql = "SELECT * FROM Article";
            $res = mysqli_query($conn, $sql);
           
          
            if ($res == TRUE){
                $count = mysqli_num_rows($res);
            }
            // verifier le nombre des lignes  
            if ($count > 0){
                while($rows = mysqli_fetch_assoc($res))
                {
                    $id = $rows['id_article'];
                    $designation = $rows['designation'];
                    $prix = $rows['prix'];
                    $categorie = $rows['categorie'];


                    ?>
                     <tr>
                <td><?php echo $id; ?>.</td>
                <td><?php echo $designation; ?></td>
                <td><?php echo $categorie; ?></td>
                  <td><?php echo $prix; ?></td>
                <td>
                    <a href="<?php echo siteurl;?>admin/modifier_article.php?id=<?php echo $id; ?>" class="btn-success p-2 text-decoration-none">Modifier Article </a>
                    <a href="<?php echo siteurl;?>admin/supprime_article.php?id=<?php echo $id; ?>" class="btn-danger p-2 text-decoration-none">Supprimer Article </a>
                </td>
            </tr>
                    <?php 

                } 
            }
            ?>
           




             </table>


        
        </div>