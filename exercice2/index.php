<?php
    include 'formValidation.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css">
        <title>TP 2</title>
        <style>
            
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid text-center">
                <div class="container">
                    <h1 class="display-3">TP 2 - PHP</h1>
                    <h2>Partie 10</h2>
                    <p class="lead">Faire une page permettant de saisir des informations. 
                        A la validation, les données saisies devront aparaitre sous le formulaire. 
                        Attention les données devront rester dans les différents éléments du formulaire même après la validation.</p>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </div>
            <?php
            // Pattern de test :
            // $stringPattern sera utilisé pour le firstName, lastName et society
            $stringPattern = '/^[A-ZÔÖÀÉÈÎÏ]{1}[a-zA-ZéèôöîïçÉÈÎÏ \'-]+([-\'\s][a-zA-ZéèôöîïçÉÈÎÏ \'-][a-zéèôöîïç \']+)?$/';
            $numberPattern = '/^[0-9]{2}$/';
            $civilityPattern = '/^[1-2]{1}$/';
            ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="index.php" method="post">
                        <fieldset>
                            <legend>Formulaire d'inscription</legend>
                            <div class="form-group">
                                <label for="civility">Civilité</label>
                                <select class="form-control <?= isset($arrayOfErrors['civility']) ? 'is-invalid' : '' ?>" name="civility" id="civility">
                                    <option value="0" <?= $_POST['civility'] === '0' ? 'selected' : '' ?>>--</option>
                                    <option value="1" <?= $_POST['civility'] == 1 ? 'selected' : '' ?>>Mme.</option>
                                    <option value="2" <?= $_POST['civility'] == 2 ? 'selected' : '' ?>>M.</option>
                                </select>
                                <span class="<?= isset($arrayOfErrors['civility']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['civility'] ?? '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Nom</label>
                                <input type="text" class="form-control <?= isset($arrayOfErrors['lastName']) ? 'is-invalid' : '' ?>" name="lastName" placeholder="Dupont" value="<?= $_POST['lastName'] ?? '' ?>">
                                <span class="<?= isset($arrayOfErrors['lastName']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['lastName'] ?? '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Prénom</label>
                                <input type="text" class="form-control <?= isset($arrayOfErrors['firstName']) ? 'is-invalid' : '' ?>" name="firstName" placeholder="Pierre" value="<?= $_POST['firstName'] ?? '' ?>">
                                <span class="<?= isset($arrayOfErrors['firstName']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['firstName'] ?? '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control <?= isset($arrayOfErrors['age']) ? 'is-invalid' : '' ?>" name="age" placeholder="12" value="<?= $_POST['age'] ?? '' ?>">
                                <span class="<?= isset($arrayOfErrors['age']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['age'] ?? '' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="society">Société</label>
                                <input type="text" class="form-control <?= isset($arrayOfErrors['society']) ? 'is-invalid' : '' ?>" name="society" placeholder="Google" value="<?= $_POST['society'] ?? '' ?>">
                                <span class="<?= isset($arrayOfErrors['society']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['society'] ?? '' ?></span>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Envoyer</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php if ($validation) { ?>
            <div class="text-center mt-5">
                <p class="display-3">Bienvenue parmis nous <?= $arrayCivility[$_POST['civility']] ?> <?= $_POST['firstName'] ?> <?= $_POST['lastName'] ?> 
                    vous avez <?= $_POST['age'] ?> ans et travaillé chez <?= $_POST['society'] ?></p>
            </div>
            <?php } ?>
        </div>
    </body>
</html>