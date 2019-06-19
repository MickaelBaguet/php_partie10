<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>TP 3</title>
  <style>
      .container-fluid{
          margin: 0;
          padding: 0;
      }
      .error {color: #FF0000;}
      hr{
          border: 2px solid black;
      }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-3">TP 3 - PHP</h1>
        <h2>Partie 10</h2>
        <p class="lead">Faire une fonction qui permet d'afficher les données des tableaux suivants :</p>
        <a href="../index.php" class="btn btn-primary">Retour</a>
      </div>
    </div>
    <?php
        $portrait1 = array('name'=>'Victor', 'firstname'=>'Hugo', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
        $portrait2 = array('name'=>'Jean', 'firstname'=>'de La Fontaine', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
        $portrait3 = array('name'=>'Pierre', 'firstname'=>'Corneille', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
        $portrait4 = array('name'=>'Jean', 'firstname'=>'Racine', 'portrait'=>'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');
        $arrayOfPortrait = array($portrait1, $portrait2, $portrait3, $portrait4);
        
        function displayMultidimensionalArray($arrayOfPortrait){
            foreach ($arrayOfPortrait as $i => $value) {
    ?>
                <div class="text-center">
                    <p class="font-weight-bold">Portrait de <?= $arrayOfPortrait[$i]['name'] ?> <?= $arrayOfPortrait[$i]['firstname'] ?></p>
                    <p><img src="<?= $arrayOfPortrait[$i]['portrait'] ?>" alt="Photo de <?= $arrayPortrait[$i]['name'] ?> <?= $arrayPortrait[$i]['firstname'] ?>" width="300"></p>
                </div>
                <?php
                if( $arrayOfPortrait[$i]['firstname'] != 'Racine' ){
                ?>
                        <hr class="w-75 my-5">
    <?php
                }
            }
        }
        displayMultidimensionalArray($arrayOfPortrait);
    ?>
  </div>
</body>
</html>