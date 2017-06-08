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
    <p>Featured items</p>
  </div>
</div>

<?php include("navbar.php"); ?>

<table class="table table-hover">
<thead> <!-- En-tête du tableau -->
   <tr>
       <th>Last Update</th>
       <th>Shop</th>
       <th>New item</th>
       <th></th>
       <th>Link</th>
   </tr>
</thead>
<tbody>
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
            <tr>
              <td><?php echo $donnees['Date']; ?></td>
              <td><?php echo $donnees['Title']; ?></td>
              <td><strong><?php echo $donnees['Feature']; ?></strong></td>
              <td><img src="img/feature_img/<?php echo $donnees['Feature_img']; ?>" class="img-responsive center-block" alt="Feature"></td>
              <td><a href="<?php echo $donnees['Link']; ?>" class="btn btn-info btn-lg" role="button">GO !</a></td>
            </tr>

    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
</tbody>
</table>

<?php include("footer.php"); ?>

</body>
</html>
