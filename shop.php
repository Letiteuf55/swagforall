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
    $ID=$_GET['ID'];
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
        $reponse = $bdd->query('SELECT * FROM shop where ID='.$ID.'');

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
    ?> 
    <div class="col-sm-12">
      <div class="panel panel-primary">
          <!-- Panel Head -->
        <div class="panel-heading">
            <?php echo $donnees['Title']; ?>
        </div>
          <!-- Panel Body -->
        <div class="panel-body" style="min-height: 100px;">
        <div class="row-fluid text-center">
            <div class="col-xs-8 col-sm-6 text-center">
                <img class="img-responsive center-block" src="img/title_img/<?php echo $donnees['Title_img']; ?>" alt="Image">
            </div>
            <div class="col-xs-2 col-sm-3 text-center center-block" style="border:1px solid #cecece; min-width: 200px">
            Welcome on this website, you can buy <strong><?php echo $donnees['Tag']; ?></strong><br>
            It's for <strong><?php echo $donnees['Faction']; ?></strong> Faction.
            </div>
            <div class="col-xs-2 col-sm-3 text-center center-block" style="border:1px solid #cecece; min-width: 200px">
            <a href="<?php echo $donnees['Link']; ?>" class="btn btn-info btn-lg" role="button">GO !</a>
            </div>
        </div>    
        <div class="row" style="min-height: 20px;">
            <div class="col-xs-12 col-sm-12">
            </div>
        </div>
        <div class="row-fluid" style="min-height: 20px;">
            <div class="col-xs-12 col-sm-12 bg-primary text-white text-center">
                Feature item : <strong><?php echo $donnees['Feature']; ?></strong>
            </div>
        </div>
        <div class="row-fluid" style="min-height: 20px;">
            <div class="col-xs-12 col-sm-12 bg-primary text-center">
                <img src="img/feature_img/<?php echo $donnees['Feature_img']; ?>" style="min-height: 100%;" class="img-responsive center-block" alt="Feature">
            </div>
        </div>
          </div>
          <!-- Panel Footer -->
        <div class="panel-footer">
            <?php echo $donnees['Link']; ?>
        </div>
        </div>
    </div>
    
    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
</div>
    
<?php include("footer.php"); ?>

</body>
</html>
