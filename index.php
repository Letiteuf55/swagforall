<!DOCTYPE html>
<html lang="en">
<head>
  <title>Swag For All</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Swag For All</h1>      
    <p>All the stuff you need !</p>
  </div>
</div>

<?php include("navbar.php"); ?>

<div class="container">
    <?php
        // setup var shop à zéro
    $shop=0; 
    ?>
    
    <?php
        try
        {
            // On se connecte à MySQL
            include("datalogin.php");
        }
    
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : '.$e->getMessage());
        }

        // Si tout va bien, on peut continuer

        // On récupère tout le contenu de la table jeux_video
        $reponse = $bdd->query('SELECT * FROM shop ORDER BY Date DESC');

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
    ?> 

    <?php
        // toute les 3 entrées on insert un "row"
        if ($shop % 3 == 0)
        { 
    ?>
    
<div class="row">
<?php
    }
 ?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div> <?php echo $donnees['Title']; ?></div><div>Last update : <?php echo $donnees['Date']; ?></div>
          </div>
        <div class="panel-body text-center">
            <a href="/shop.php?ID=<?php echo $donnees['ID']; ?>"><img class="img-responsive center-block" src="img/title_img/<?php echo $donnees['Title_img']; ?>" alt="Image"></a>
        </div>
        <div class="panel-footer"><?php echo $donnees['Tag']; ?></div>
      </div>
    </div>
    
    <?php
        // toute les 3 entrées on insert un "row"
        if ($shop % 3 == 2)
        { 
    ?>
</div>
<?php
    }
    ?>
    <?php
        // on ajoute 1 à chaque entrée
    $shop++;
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
</div>
    
<?php include("footer.php"); ?>

</body>
</html>
