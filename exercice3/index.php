<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css">    
        <title>TP 3</title>
        <style>
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
            // Liste de tableaux associatifs
            $portrait1 = array('name' => 'Victor', 'firstname' => 'Hugo', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg');
            $portrait2 = array('name' => 'Jean', 'firstname' => 'de La Fontaine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg');
            $portrait3 = array('name' => 'Pierre', 'firstname' => 'Corneille', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg');
            $portrait4 = array('name' => 'Jean', 'firstname' => 'Racine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg');
            $arrayOfPortrait = array($portrait1, $portrait2, $portrait3, $portrait4);

            // Fonction permettant d'afficher le tableau de tableau associatif
            function displayMultidimensionalArray($arrayOfPortrait) {
                // On parcours tout les tableaux de arrayOfPortrait (avec '=> $value' afin d'éviter l'erreur: Illegal offset type)
                foreach ($arrayOfPortrait as $portrait => $value) {
                    // Puis on affiche le contenu des tableaux associatifs :
                    ?>
                    <div class="text-center">
                        <p class="font-weight-bold">Portrait de <?= $arrayOfPortrait[$portrait]['name'] ?> <?= $arrayOfPortrait[$portrait]['firstname'] ?></p>
                        <p><img src="<?= $arrayOfPortrait[$portrait]['portrait'] ?>" alt="Photo de <?= $arrayPortrait[$portrait]['name'] ?> <?= $arrayPortrait[$portrait]['firstname'] ?>" width="300"></p>
                    </div>
                    <?php
                    // On mets un hr sauf pour Raçine (le dernier)
                    if ($arrayOfPortrait[$portrait]['firstname'] != 'Racine') {
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