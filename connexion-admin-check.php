<?php if(!isset($_SESSION['admin'])){


$_SESSION['no-login'] = "<div   class='btn-danger p-2'>veuillez vous connecter pour accéder au panier</div>";
header('location:'.siteurl."admin/connexion-admin.php");}
?>