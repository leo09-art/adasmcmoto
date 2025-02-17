<?php  
include 'confirmation.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $lienImg = $_POST['lienImg'];
    $img =$bdd->prepare( 'INSERT into image(idImg,lienImg) VALUES(null,:lienImg)');
    $img->bindParam(':lienImg',$lienImg);
    $img->execute();
    echo $lienImg;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>ajout <?php echo $lienImg; ?></h1> -->
</body>
</html>