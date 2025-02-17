<?php
// include 'pdo.php';
// if ($_SERVER['REQUEST_METHOD']=='POST'){
// $email = $_GET['email'];
// }
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Images', 'root', '');
    echo "connexion reussie";
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body .head {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-template-rows: auto;
            grid-template-areas: 
            "head1 head1 head2 head2";

        }
        .body .head1{
            grid-area: head1;
        }
        .body .head2{
            grid-area: head2;
        }
        .circle {
            height: 500px;
            width: 500px;
            background-color: #f45faa;
            position: relative;
        }
        .circle i {
            position: absolute;
            inset: 0;
            border: 2px solid black;
            transition: 1s;

        }
        .circle i:nth-child(1){
            border-radius: 98% 94% 90% 86%/90% 86% 94% 98%;
            animation: 5s mymove infinite linear;
        }
        .circle i:nth-child(2){
            border-radius: 90px 65px 80px 55px/85px 75px 65px 85px;
            animation: 7s mymove infinite linear;
        }
        .circle i:nth-child(3){
            border-radius: 50%;
            animation: 3s mymove infinite linear;
        }
        @keyframes mymove{
            0%{transform: rotate(0deg);}
            100%{transform: rotate(360deg);}
        }
        .circle:hover i{
            border: 6px solid var(--clr);
            filter: drop-shadow(0 0 30px var(--clr));
        }
    </style>
</head>

<body>
    <!-- <p><?php echo $email; ?> sur notre forum</p> -->
    <center>
        <form action="addImg.php" method="post">
            <div class="container">
                <div>
                    <label>Lien de l'image</label>
                    <input type="text" name="lienImg"> <br>
                    <input type="submit">

                </div>
            </div>
        </form>
        <?php
        $req = $bdd->query('SELECT * from image');
        $img = $req->fetchAll();
        foreach ($img as $elt): ?>
            <!-- <img style="width: 500px;" src="<?php echo $elt['lienImg'] ?>" alt="img"> -->
            <a href="<?php echo $elt['lienImg'] ?>"><?php echo $elt['lienImg'] ?></a>
        <?php endforeach; ?>
    </center>
    <div class="head">
        <div class="head1">
            <h2>Brand name</h2>
        </div>
        <div class="head2">
            <button>Logout</button>
        </div>

    </div>
    <div class="circle">
        <i style="--clr:#45ff12;"></i>
        <!-- <i style="--clr:yellow;"></i> -->
        <!-- <i style="--clr:red;"></i> -->
    </div>
</body>

</html>