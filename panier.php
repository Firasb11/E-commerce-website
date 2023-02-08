<?php include_once("../connect.inc.php") ?>
<?php include_once("entent.html") ?>



<?php if (isset($_GET['id'])){
    $id_article = $_GET['id'];
    $quantité = $_GET['quantité'];
    $sql1 = "INSERT INTO panier SET  id = $id_article ";
    $res1 = mysqli_query($conn, $sql1); 
}
?>

<?php 

$sql3= "SELECT * FROM panier ";
$res3 = mysqli_query($conn, $sql3); 
$count3 = mysqli_num_rows($res3);
if ($count3 > 0){
    while($rows3 = mysqli_fetch_assoc($res3))
    {
       $id1 = $rows3['id'];
  
    }}?>
<?php
$sql = "SELECT * FROM article where id_article = $id1 ";
$res = mysqli_query($conn, $sql); 
$count = mysqli_num_rows($res);
if ($count > 0){
    while($rows = mysqli_fetch_assoc($res))
    {
       $id_article = $rows['id_article'];
        $designation = $rows['designation'];
        $prix = $rows['prix'];
        $categorie = $rows['categorie'];
        $nom_image = $rows['nom_image'];
        $_SESSION['total'] += $quantité * $prix;
       
        ?>
<table border="1">

  <tr>
    <th>Code Article</th>
    <th>Désignation</th>
    <th>Quantité<?php echo $quantité;?></th>
    <th>Prix Unitaire</th>
    <th>Prix totale</th>
  </tr>
  <tr>
    <td><?php echo $id_article;?></td>
    <td><?php echo $designation;?></td>
    <td><?php echo $quantité;?></td>
    <td><?php echo $prix;?></td>
    <td><?php echo $quantité * $prix;?></td>
  </tr>

  <tr>
    <th colspan="4">Prix Total TTC</th>
  
    <td><?php echo $_SESSION['total'] ;?></td>
  </tr>

</table>
<?php
}}
?>















<?php include_once("pied.html");?>