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
        A la validation, les données saisies devront aparaitre sous le formulaire. Attention les données devront rester dans les différents éléments du formulaire même après la validation.</p>
        <a href="../index.php" class="btn btn-primary">Retour</a>
      </div>
    </div>
    <?php
        // Pattern de test :
        // $stringPattern sera utilisé pour le firstName, lastName, countryOfBirth, nationality
        $accentedCharacters = 'àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ';
        $stringPattern = '/^[A-ZÔÖÀÉÈÎÏ]{1}[a-zA-ZéèôöîïçÉÈÎÏ \'-]+([-\'\s][a-zA-ZéèôöîïçÉÈÎÏ \'-][a-zéèôöîïç \']+)?$/';
        $numberPattern = '/^[0-9]{2}$/';
        $civilityPattern = '/^[1-2]{1}$/';
    ?>
    <form class="justify-content-center row" action="index.php" method="get">
        <table class="justify-content-center text-center table col-10">
            <tr>
                <td colspan="2"><span class="error">*</span> : champ obligatoire</td>
            </tr>
            <tr>
                <td>
                    <label for="civility">Civilité <span class="error">* <?= !empty($_GET) && (preg_match($civilityPattern, $_GET['civility']) == false) ? 'Civilité invalide !' : '' ;?></span></label>
                </td>
                <td>
                    <select name="civility" id="civility">
                        <option value="">--</option>
                        <!-- Si la valeur du GET correspond à la value de l'option on ajout un 'selected' dans l'option ... -->
                        <!-- ... afin de garder la valeur selectionnée -->
                        <option value="1" <?= $_GET['civility'] == 1 ? 'selected' : '' ?>>Madame</option>
                        <option value="2" <?= $_GET['civility'] == 2 ? 'selected' : '' ?>>Monsieur</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class=""><label for="lastName">Nom <span class="error">* <?= !empty($_GET) && (preg_match($stringPattern, $_GET['lastName']) == false) ? 'Nom invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="lastName" placeholder="Dupont" value="<?= $_GET['lastName'] ?>"></td>
            </tr>
            <tr>
                <td><label for="firstName">Prénom <span class="error">* <?= !empty($_GET) && (preg_match($stringPattern, $_GET['firstName']) == false) ? 'Prénom invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="firstName" placeholder="Jean" value="<?= $_GET['firstName'] ?>"></td>
            </tr>
            <tr>
                <td><label for="age">Age <span class="error">* <?= !empty($_GET) && (preg_match($numberPattern, $_GET['age']) == false) ? 'Age invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="age" placeholder="12" value="<?= $_GET['age'] ?>"></td>
            </tr>
            <tr>
                <td><label for="society">Société <span class="error">* <?= !empty($_GET) && (preg_match($stringPattern, $_GET['society']) == false) ? 'Nom de société invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="society" placeholder="Google" value="<?= $_GET['society'] ?>"></td>
            </tr>
            <tr class="">
                <td colspan="2" class="">
                    <input class="btn btn-outline-secondary btn-lg btn-block offset-8 w-25" type="submit" value="OK">
                </td>
            </tr>
        </table>
        <?php
            if (preg_match($civilityPattern, $_GET['civility']) && preg_match($stringPattern, $_GET['lastName']) 
                && preg_match($stringPattern, $_GET['firstName']) && preg_match($numberPattern, $_GET['age']) 
                && preg_match($stringPattern, $_GET['society'])) {
        ?>
            <div class="d-block justify-content-start">
                <?php
                    switch ($_GET['civility']) {
                        case 1:
                            $nameCivility = 'Madame';
                            break;
                        case 2:
                            $nameCivility = 'Monsieur';
                            break;
                    }
                ?>
                <p>Bienvenue parmis nous <?= $nameCivility ?> <?= $_GET['firstName'] ?> <?= $_GET['lastName'] ?> 
                    vous avez <?= $_GET['age'] ?> ans et travaillé chez <?= $_GET['society'] ?></p>
            </div>
        <?php
            }
        ?>
    </form>
  </div>
</body>
</html>