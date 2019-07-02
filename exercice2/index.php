<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>TP 2</title>
  <style>
      .container-fluid{
          margin: 0;
          padding: 0;
      }
      .error {color: #FF0000;}
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
    <form class="justify-content-center row" action="index.php" method="post">
        <table class="justify-content-center text-center table col-6">
            <tr>
                <td colspan="2"><span class="error">*</span> : champ obligatoire</td>
            </tr>
            <tr>
                <td>
                    <label for="civility">Civilité <span class="error">* <?= !empty($_POST) && (!preg_match($civilityPattern, $_POST['civility'])) ? 'Civilité invalide !' : '' ;?></span></label>
                </td>
                <td>
                    <select name="civility" id="civility">
                        <option value="">--</option>
                        <!-- Si la valeur du POST correspond à la value de l'option on ajout un 'selected' dans l'option ... -->
                        <!-- ... afin de garder la valeur selectionnée -->
                        <option value="1" <?= $_POST['civility'] == 1 ? 'selected' : '' ?>>Madame</option>
                        <option value="2" <?= $_POST['civility'] == 2 ? 'selected' : '' ?>>Monsieur</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class=""><label for="lastName">Nom <span class="error">* <?= !empty($_POST) && (!preg_match($stringPattern, $_POST['lastName'])) ? 'Nom invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="lastName" placeholder="Dupont" value="<?= $_POST['lastName'] ?>"></td>
            </tr>
            <tr>
                <td><label for="firstName">Prénom <span class="error">* <?= !empty($_POST) && (!preg_match($stringPattern, $_POST['firstName'])) ? 'Prénom invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="firstName" placeholder="Jean" value="<?= $_POST['firstName'] ?>"></td>
            </tr>
            <tr>
                <td><label for="age">Age <span class="error">* <?= !empty($_POST) && (!preg_match($numberPattern, $_POST['age'])) ? 'Age invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="age" placeholder="12" value="<?= $_POST['age'] ?>"></td>
            </tr>
            <tr>
                <td><label for="society">Société <span class="error">* <?= !empty($_POST) && (!preg_match($stringPattern, $_POST['society'])) ? 'Nom de société invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="society" placeholder="Google" value="<?= $_POST['society'] ?>"></td>
            </tr>
            <tr class="">
                <td colspan="2" class="">
                    <input class="btn btn-outline-secondary btn-lg" type="submit" value="OK">
                </td>
            </tr>
        </table>
        <?php
            // Si tout les champs sont remplis correctement :
            if (preg_match($civilityPattern, $_POST['civility']) && preg_match($stringPattern, $_POST['lastName']) 
                && preg_match($stringPattern, $_POST['firstName']) && preg_match($numberPattern, $_POST['age']) 
                && preg_match($stringPattern, $_POST['society'])) {
        ?>
            <div class="d-block justify-content-start">
                <?php
                    switch ($_POST['civility']) {
                        case 1:
                            $nameCivility = 'Madame';
                            break;
                        case 2:
                            $nameCivility = 'Monsieur';
                            break;
                    }
                ?>
                <p>Bienvenue parmis nous <?= $nameCivility ?> <?= $_POST['firstName'] ?> <?= $_POST['lastName'] ?> 
                    vous avez <?= $_POST['age'] ?> ans et travaillé chez <?= $_POST['society'] ?></p>
            </div>
        <?php
            }
        ?>
    </form>
  </div>
</body>
</html>