


<?php include('../connect.inc.php'); 

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
    <?php 
                          if(isset($_GET['id'])){
                              $id=$_GET['id']; 
                          
                              $sql2 = " SELECT * FROM article  WHERE id_article=$id";
                              $res2 = mysqli_query($conn, $sql2);
                        
                                  $count = mysqli_num_rows($res2);
                              
                                  if($count == 1){
                                      $row2 = mysqli_fetch_assoc($res2);

                                      $id = $row2['id_article'];
                                      $designation = $row2['designation'];
                                      $prix = $row2['prix'];
                                      $categorie = $row2['categorie'];
                  
                                      $image = $row2['nom_image'];
                                   
                                 
                                }
                               else {
                                $_SESSION['no-food-found'] = "<div   class='btn-danger p-2'>erreur modification d'article (pas trouvé) </div>";
                                   header("Location:".siteurl.'admin/gestion_article.php');
                               }}
                               ?>
                        

<div class="main-content py-5 ">
    <div class="wrapper py-5 ">
    
	<!-- FORM  -->
    <div class="col-md-10 ml-5 pl-5 ">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="card ml-5" >
					<div class="card-header">
                    <h3>Ajoute Article</h3>
				  	</div>
         
        
           
					<div class="card-body">
                        <label class="control-label" >id_article :</label>
							<input type="number" name="id_article" value="<?php echo $id;?>" />
							<div class="form-group">
								<label class="control-label" >designation :</label>
								<input type="text" class="form-control" name="designation"  value="<?php echo $designation;?>">
							</div>
                            <div class="form-group">
                             <label class="control-label" >Current Image :</label>
                            <?php if ($image != "") {
                              ?>
                           <img src="<?php echo siteurl; ?>../pages/images/<?php echo $image;  ?> "width=100px;/>

                              <?php 
             
                                       }
                                      else {
                                      echo  "<div   class='btn-danger p-2'>image pas ajouter </div>";
                                         }
                                     ?>
                                                 </div>
             
                                   <div class="form-group">
								<label class="control-label" >select image :</label>
                                <br>
                                <input type="file"  name="image"    />
                                </div>
                             <div class="form-group">
                             <label class="control-label">prix</label>
                             <input type ="number" class="form-control" name="prix" placeholder="prix €" value="<?php echo $prix;?>"></input>  
                              </div>
                             </div>
                             </div>
                             <div class="card-footer"> 
					                   	<div class="row">
					                 		<div class="col-md-12">
						               		<button class="btn btn-md btn-success col-sm-3 offset-md-3" name="submit"> Enregister</input>
						              		<button class="btn btn-md btn-secondary col-sm-3" name="cancel"> Page D'accueil</input>
						                 	</div>
					                	</div>
				              	</div>
                        </form>

                        <div class="footer">
            <div class="wrapper" >
                <p class="text-center">&copy; 2022 Copyright  developed by  Firas Belhiba </p>
                
            </div>
        </div>
    </body>
    </html>
<?php 
 if(isset($_POST['submit'])){

   $id_article = $_POST['id_article'];
   $designation = $_POST['designation'];
  $prix = $_POST['prix'];
 
    if(isset($_FILES['image']['name'])){
 $nom_image = $_FILES['image']['name'];
    
    
     if($nom_image != ""){
     
     $ext1 = explode('.', $nom_image);
     $ext2=end($ext1);
     $nom_image = "Article_".rand(000,999).".".$ext2;
      $srcp = $_FILES['image']['tmp_name'];
      $dist_path = "../pages/images/".$nom_image;
     
     
      //upload  image 
      $upload = move_uploaded_file($srcp, $dist_path);
      if ($upload == false){ 
         $_SESSION['uploadp'] ="<div   class='btn-danger p-2'>Erreur d' upload image </div>";
    
         //fini le processus
         die();
      }
    }
    }
   else{
    $nom_image ="";
   }
 
   $sql = "UPDATE article SET 
          id_article = $id_article , 
          designation = '$designation',
          prix = $prix,
          nom_image = '$nom_image' WHERE id_article= $id;
          
     
         
          ";
$res = mysqli_query($conn,$sql);
echo $res;

if ($res == true){
    
    $_SESSION['modifier_succ'] = "<div   class='btn-success p-2'>Article ajouté avec succée</div>";
    header('location:'.siteurl."admin/gestion_article.php");
    
    
    }
    else {
     $_SESSION['modifier_succ'] ="<div class='btn-danger p-2'>Article non ajouter</div>";
     header('location:'.siteurl."admin/gestion_article.php");
    }
    




}



if(isset($_POST['cancel'])){

    header('location:'.siteurl."admin/gestion_article.php");
   
   }
?>


