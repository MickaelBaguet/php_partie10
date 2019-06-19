<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>TP 1</title>
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
        <h1 class="display-3">TP 1 - PHP</h1>
        <h2>Partie 10</h2>
        <p class="lead">Faire une page pour enregistrer un futur apprenant.</p>
        <a href="../index.php" class="btn btn-primary">Retour</a>
      </div>
    </div>
    <?php
        // Pattern de test :
        // $stringPattern sera utilisé pour le firstName, lastName, countryOfBirth, nationality
        $accentedCharacters = 'àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ';
        $stringPattern = '/^[A-ZÔÖÀÉÈÎÏ]{1}[a-zA-ZéèôöîïçÉÈÎÏ \'-]+([-\'\s][a-zA-ZéèôöîïçÉÈÎÏ \'-][a-zéèôöîïç \']+)?$/';
        $emailPattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        $datePattern = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
        $phonePattern = '/^[0][0-9]{9}$/';
        $idPoleEmploiPattern = '/^[0-9]{7}[A-Z]{1}$/';
        $urlPattern = '/^https:\/\/codecombat\.com\/user\/[a-z0-9][a-z0-9_-]*$/' ;
        $addressPattern = '/^[a-zA-Z0-9][a-zA-Z'.$accentedCharacters.'0-9 \'-]*$/';
        $numberPattern = '/^[0-9]+$/';
        $degreePattern = '/^[1-2-3-4]{1}$/';
    ?>
    <form class="justify-content-center row" action="index.php" method="get">
        <?php
            // !preg_match ( string $pattern , string $subject)
            if (!preg_match($stringPattern, $_GET['lastName']) || !preg_match($stringPattern, $_GET['firstName']) 
                || !preg_match($datePattern, $_GET['dateOfBirth']) || !preg_match($stringPattern, $_GET['countryOfBirth'])
                || !preg_match($stringPattern, $_GET['nationality']) || !preg_match($addressPattern, $_GET['address'])
                || !preg_match($emailPattern, $_GET['email']) || !preg_match($phonePattern, $_GET['phone']) 
                || !preg_match($degreePattern, $_GET['degree']) || !preg_match($idPoleEmploiPattern, $_GET['idPoleEmploi']) 
                || !preg_match($numberPattern, $_GET['numberBadge']) || !preg_match($urlPattern, $_GET['linkCodeAc'])) {            
        ?>
        <table class="justify-content-center text-center table col-10">
            <tr>
                <td colspan="2"><span class="error">*</span> : champ obligatoire</td>
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
                <td><label for="dateOfBirth">Date de naissance <span class="error">* <?= !empty($_GET) && (preg_match($datePattern, $_GET['dateOfBirth']) == false) ? 'Date de naissance invalide !' : '' ;?></span></label></td>
                <td><input type="date" name="dateOfBirth" value="<?= $_GET['dateOfBirth'] ?>"></td>
            </tr>
            <tr>
                <td><label for="countryOfBirth">Pays de naissance <span class="error">* <?= !empty($_GET) && (preg_match($stringPattern, $_GET['countryOfBirth']) == false) ? 'Nom de pays invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="countryOfBirth" placeholder="France" value="<?= $_GET['countryOfBirth'] ?>"></td>
            </tr>
            <tr>
                <td><label for="nationality">Nationalité <span class="error">* <?= !empty($_GET) && (preg_match($stringPattern, $_GET['nationality']) == false) ? 'Nationalité invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="nationality" placeholder="Français" value="<?= $_GET['nationality'] ?>"></td>
            </tr>
            <tr>
                <td><label for="address">Adresse <span class="error">* <?= !empty($_GET) && (preg_match($addressPattern, $_GET['address']) == false) ? 'Adresse invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="address" placeholder="10 rue d'en haut" value="<?= $_GET['address'] ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email <span class="error">* <?= !empty($_GET) && (preg_match($emailPattern, $_GET['email']) == false) ? 'Email invalide !' : '' ;?></span></label></td>
                <td><input type="email" name="email" placeholder="adressemail@hebergeur.fr" value="<?= $_GET['email'] ?>"></td>
            </tr>
            <tr>
                <td><label for="phone">Téléphone <span class="error">* <?= !empty($_GET) && (preg_match($phonePattern, $_GET['phone']) == false) ? 'Téléphone invalide !' : '' ;?></span></label></td>
                <td><input type="tel" name="phone" placeholder="0612345678" value="<?= $_GET['phone'] ?>"></td>
            </tr>
            <tr>
                <td class="" colspan="2">
                    <p>Plus haut diplôme : <span class="error">* <?= !empty($_GET) && (preg_match($degreePattern, $_GET['degree']) == false) ? 'Diplome invalide !' : '' ;?></span></p>
                </td>
                <td>
                    <tr>
                        <td><input type="radio" id="none" name="degree" value="0"></td>
                        <td><label for="Pas de diplome">Pas de diplome</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" id="bac" name="degree" value ="1"></td>
                        <td><label for="bac">Bac</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" id="bac2" name="degree" value="2"></td>
                        <td><label for="bac2">Bac +2</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" id="bac3" name="degree" value="3"></td>
                        <td><label for="bac3">Bac +3</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" id="bac5Plus" name="degree" value="4"></td>
                        <td><label for="bac5Plus">Bac +5 et supérieur</label></td>
                    </tr>
                </td>
            </tr>
            <tr>
                <td><label for="idPoleEmploi">Numéro pôle emploi <span class="error">* <?= !empty($_GET) && (preg_match($idPoleEmploiPattern, $_GET['idPoleEmploi']) == false) ? 'Numéro Pole Emploi invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="idPoleEmploi" placeholder="0123456A" value="<?= $_GET['idPoleEmploi'] ?>"></td>
            </tr>
            <tr>
                <td><label for="numberBadge">Nombre de badge <span class="error">* <?= !empty($_GET) && (preg_match($numberPattern, $_GET['numberBadge']) == false) ? 'Nombre badge invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="numberBadge" placeholder="1, 2, 3, ..." value="<?= $_GET['numberBadge'] ?>"></td>
            </tr>
            <tr>
                <td><label for="linkCodeAc">Liens codecademy <span class="error">* <?= !empty($_GET) && (preg_match($urlPattern, $_GET['linkCodeAc']) == false) ? 'Lien Code Combat invalide !' : '' ;?></span></label></td>
                <td><input type="text" name="linkCodeAc" placeholder="https://codecombat.com/user/userName" value="<?= $_GET['linkCodeAc'] ?>"></td>
            </tr>
            <tr>
                <td><label for="heroOrNot">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ? <span class="error">* <?= !empty($_GET) && ($_GET['heroOrNot'] == '') ? 'Veuillez remplir le champ héro !' : '' ;?></span></label></td>
                <td><textarea name="heroOrNot" id="heroOrNot" cols="50" rows="3" value="<?= $_GET['heroOrNot'] ?>"></textarea></td>
            </tr>
            <tr>
                <td><label for="historyHack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique) <span class="error">* <?= !empty($_GET) && ($_GET['historyHack'] == '') ? 'Veuillez remplir le champ hack !' : '' ;?></span></label></td>
                <td><textarea name="historyHack" id="historyHack" cols="50" rows="3" value="<?= $_GET['historyHack'] ?>"></textarea></td>
            </tr>
            <tr>
                <td><label for="expInfo">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ? <span class="error">* <?= !empty($_GET) && ($_GET['expInfo'] == '') ? 'Veuillez remplir le champ expérience !' : '' ;?></span></label></td>
                <td><textarea name="expInfo" id="expInfo" cols="50" rows="3" value="<?= $_GET['expInfo'] ?>"></textarea></td>
            </tr>
            <tr class="">
                <td colspan="2" class="">
                    <input class="btn btn-outline-secondary btn-lg btn-block offset-8 w-25" type="submit" value="OK">
                </td>
            </tr>
        </table>
        <?php
            } else {
        ?>
        <div class="d-block justify-content-start">
            <?php
                switch ($_GET['degree']) {
                    case 0:
                        $nameDegree = 'Vous n\'avez pas de diplôme';
                        break;
                    case 1:
                        $nameDegree = 'Vous avez un Bac';
                        break;
                    case 2:
                        $nameDegree = 'Vous avez un Bac+2';
                        break;
                    case 3:
                        $nameDegree = 'Vous avez un Bac+3';
                        break;
                    case 4:
                        $nameDegree = 'Vous avez un Bac+5 ou supérieur';
                        break;
                }
                $dateDDMMYYY = new DateTime($_GET['dateOfBirth']);
            ?>
            <p>Bienvenue parmis nous <?= $_GET['firstName'] ?> <?= $_GET['lastName'] ?>.</p>
            <p>Voici vos informations :</p>
            <ul>
                <li>Vous êtes né(e) en <?= $_GET['countryOfBirth'] ?> le <?= $dateDDMMYYY->format('d/m/Y'); ?> et vous êtes <?= $_GET['nationality'] ?>.</li>
                <li>Vos coordonées :</li>
                <ul>
                    <li>Adresse : <?= $_GET['address'] ?></li>
                    <li>Mail : <?= $_GET['email'] ?></li>
                    <li>Téléphone : <?= $_GET['phone'] ?></li>
                </ul>
                <li><?= $nameDegree ?></li>
                <li>Votre numéro Pôle-Emploi : <?= $_GET['idPoleEmploi'] ?></li>
                <li>Vous possèdez <?= $_GET['numberBadge'] ?> badge(s) en tout, c'est bien !</li>
                <li><a href="<?= $_GET['linkCodeAc'] ?>">Profil CodeCombat</a></li>
                <li>Votre personnage préféré et pourquoi :</li>
                <ul>
                    <li><?= $_GET['heroOrNot'] ?></li>
                </ul>
                <li>L'un de vos 'hacks' :</li>
                <ul>
                    <li><?= $_GET['historyHack'] ?></li>
                </ul>
                <li>Votre expérience dans la programmation et/ou l'informatique :</li>
                <ul>
                    <li><?= $_GET['expInfo'] ?></li>
                </ul>
            </ul>
        </div>
        <?php
        }
        ?>
    </form>
  </div>
</body>
</html>