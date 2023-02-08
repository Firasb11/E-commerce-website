<?php 

include('../connect.inc.php'); 


$id = $_GET['id'];


$sql = "DELETE FROM article WHERE id_article = $id";

$res = mysqli_query($conn, $sql);

if($res==true)
{


    $_SESSION['supprimer'] = "<div   class='btn-success p-2'>Article supprimé avec succée</div>";
    header('location:'.siteurl."admin/gestion_article.php");
}
else {

    $_SESSION['supprimer'] = "<div   class='btn-danger p-2'>echec de processus </div>";
    header('location:'.siteurl."admin/gestion_article.php");
}


?>