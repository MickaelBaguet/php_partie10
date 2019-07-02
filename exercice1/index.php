<?php
    include 'formValidation.php';
    include 'country-list-array.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css">
        <title>TP 1</title>
        <style>
            .alert{
                padding : 0.25rem 1.5rem !important;
                margin-left: 1em;
            }
            .text-danger{
                margin-left: 10px;
            }
            li{
                padding: 3px 0;
            }
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php 
                        // Si le formulaire n'est pas valide on reste dessus 
                        if (!$validation) { 
                    ?>
                        <form action="index.php" method="post">
                            <fieldset>
                                <legend>Formulaire d'inscription</legend>
                                <div class="form-group">
                                    <label for="lastName">Nom</label>
                                    <?php 
                                        // Pour chaque input : 
                                        // - On test s'il y a message d'erreur pour son champ, si c'est le cas on insert la classe 'is-invalid' (border rouge) ...
                                        // - On garde la value du POST dans le champs (il sera vide s'il est erroné (cf -> test))
                                        // - On insert une classe text-danger (texte rouge) et  un message d'erreur si l'input possède un message d'erreur
                                    ?>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['lastName']) ? 'is-invalid' : '' ?>" name="lastName" placeholder="Dupont" value="<?= $_POST['lastName'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['lastName']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['lastName'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="firstName">Prénom</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['firstName']) ? 'is-invalid' : '' ?>" name="firstName" placeholder="Pierre" value="<?= $_POST['firstName'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['firstName']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['firstName'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="dateOfBirth">Date de naissance</label>
                                    <input type="date" class="form-control <?= isset($arrayOfErrors['dateOfBirth']) ? 'is-invalid' : '' ?>" name="dateOfBirth" value="<?= $_POST['dateOfBirth'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['dateOfBirth']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['dateOfBirth'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="countryOfBirth">Pays de naissance</label>
                                    <select class="form-control <?= isset($arrayOfErrors['countryOfBirth']) ? 'is-invalid' : '' ?>" name="countryOfBirth" id="countryOfBirth">
                                        <option disabled selected>Selectionnez un pays</option>
                                        <?php 
                                            // Pour les menus déroulant on utilise le tableau de country-list-array.php (regroupant tout les pays) ...
                                            // ... afin de créer dynamiquement une option pour chaque pays 
                                            foreach ($countryList as $country): 
                                        ?>
                                            <option value="<?= $country ?>" <?= (isset($_POST['countryOfBirth']) && $_POST['countryOfBirth'] == $country) ? 'selected' : '' ?>><?= $country ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="<?= isset($arrayOfErrors['countryOfBirth']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['countryOfBirth'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nationality">Nationalité</label>
                                    <select class="form-control <?= isset($arrayOfErrors['nationality']) ? 'is-invalid' : '' ?>" name="nationality" id="nationality">
                                        <option disabled <?= (!isset($_POST['nationality']) || $_POST['nationality'] == '') ? 'selected' : '' ?>>Selectionnez un pays</option>
                                        <?php 
                                            // Pour les menus déroulant on utilise le tableau de country-list-array.php (regroupant tout les pays) ...
                                            // ... afin de créer dynamiquement une option pour chaque pays 
                                            foreach ($countryList as $country): 
                                        ?>
                                            <option value="<?= $country ?>" <?= (isset($_POST['nationality']) && $_POST['nationality'] == $country) ? 'selected' : '' ?>><?= $country ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="<?= isset($arrayOfErrors['nationality']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['nationality'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="address">Adresse</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['address']) ? 'is-invalid' : '' ?>" name="address" placeholder="19 rue du haut" value="<?= $_POST['address'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['address']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['address'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['email']) ? 'is-invalid' : '' ?>" name="email" placeholder="exemple@hebergeur.fr" value="<?= $_POST['email'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['email']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['email'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['phone']) ? 'is-invalid' : '' ?>" name="phone" placeholder="0612345678" value="<?= $_POST['phone'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['phone']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['phone'] ?? '' ?></span>
                                </div>
                                <fieldset class="form-group">
                                    <legend>Votre niveau d'étude</legend>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <?php 
                                                // On garde la valeur du bouton radio grâce à sa valeur POST
                                            ?>
                                            <input type="radio" class="form-check-input" name="degree" id="optionsRadios1" value="0" <?= ($_POST && $_POST['degree'] === '0') ? 'checked' : '' ?>>
                                            Pas de diplôme
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="degree" id="optionsRadios2" value="1" <?= ($_POST['degree'] == 1) ? 'checked' : '' ?>>
                                            Bac
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="degree" id="optionsRadios3" value="2" <?= ($_POST['degree'] == 2) ? 'checked' : '' ?>>
                                            Bac +2
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="degree" id="optionsRadios4" value="3" <?= ($_POST['degree'] == 3) ? 'checked' : '' ?>>
                                            Bac +3
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="degree" id="optionsRadios5" value="4" <?= ($_POST['degree'] == 4) ? 'checked' : '' ?>>
                                            Bac +5 et plus
                                        </label>
                                    </div>
                                    <span class="<?= isset($arrayOfErrors['degree']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['degree'] ?? '' ?></span>
                                </fieldset>
                                <div class="form-group">
                                    <label for="idPoleEmploi">Numéro Pôle Emploi</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['idPoleEmploi']) ? 'is-invalid' : '' ?>" name="idPoleEmploi" placeholder="0123456A" value="<?= $_POST['idPoleEmploi'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['idPoleEmploi']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['idPoleEmploi'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="numberBadge">Nombre de badge</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['numberBadge']) ? 'is-invalid' : '' ?>" name="numberBadge" placeholder="1, 2, 3, ..." value="<?= $_POST['numberBadge'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['numberBadge']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['numberBadge'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="linkCodeAc">Liens codecademy</label>
                                    <input type="text" class="form-control <?= isset($arrayOfErrors['linkCodeAc']) ? 'is-invalid' : '' ?>" name="likeCodeAc" placeholder="https://codecademy.com/user/username" value="<?= $_POST['linkCodeAc'] ?? '' ?>">
                                    <span class="<?= isset($arrayOfErrors['linkCodeAc']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['linkCodeAc'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="heroOrNot">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi?</label>
                                    <textarea class="form-control <?= isset($arrayOfErrors['heroOrNot']) ? 'is-invalid' : '' ?>" name="heroOrNot" rows="3"><?= $_POST['heroOrNot'] ?? '' ?></textarea>
                                    <span class="<?= isset($arrayOfErrors['heroOrNot']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['heroOrNot'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="historyHack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)</label>
                                    <textarea class="form-control <?= isset($arrayOfErrors['historyHack']) ? 'is-invalid' : '' ?>" name="historyHack" rows="3"><?= $_POST['historyHack'] ?? '' ?></textarea>
                                    <span class="<?= isset($arrayOfErrors['historyHack']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['historyHack'] ?? '' ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="expInfo">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
                                    <textarea class="form-control <?= isset($arrayOfErrors['expInfo']) ? 'is-invalid' : '' ?>" name="expInfo" rows="3"><?= $_POST['expInfo'] ?? '' ?></textarea>
                                    <span class="<?= isset($arrayOfErrors['expInfo']) ? 'text-danger' : '' ?>"><?= $arrayOfErrors['expInfo'] ?? '' ?></span>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Envoyer</button>
                            </fieldset>
                        </form>
                        <div>
                            <?php
                        // Sinon le formualaire est correctement rempli et on affiche les informations 
                        } else {
                            // On récupère la date de naissance afin de l'afficher dans un format dd/mm/yyyy
                            $dateDDMMYYY = new DateTime($_POST['dateOfBirth']);
                            ?>
                            <p>Bienvenue parmis nous <?= $_POST['firstName'] ?> <?= $_POST['lastName'] ?>.</p>
                            <p>Voici vos informations :</p>
                            <ul>
                                <li>Vous êtes né(e) en <?= $_POST['countryOfBirth'] ?> le <?= $dateDDMMYYY->format('d/m/Y'); ?> et vous êtes <?= $_POST['nationality'] ?>.</li>
                                <li>Vos coordonées :</li>
                                <ul>
                                    <li>Adresse : <?= $_POST['address'] ?></li>
                                    <li>Mail : <?= $_POST['email'] ?></li>
                                    <li>Téléphone : <?= $_POST['phone'] ?></li>
                                </ul>
                                <li><?= $arrayDegree[$_POST['degree']] ?></li>
                                <li>Votre numéro Pôle-Emploi : <?= $_POST['idPoleEmploi'] ?></li>
                                <li>Vous possèdez <?= $_POST['numberBadge'] ?> badge(s) en tout, c'est bien !</li>
                                <li><a href="<?= $_POST['linkCodeAc'] ?>">Profil CodeAcademy</a></li>
                                <li>Votre personnage préféré et pourquoi :</li>
                                <ul>
                                    <li><?= htmlspecialchars($_POST['heroOrNot']) ?></li>
                                </ul>
                                <li>L'un de vos 'hacks' :</li>
                                <ul>
                                    <li><?= htmlspecialchars($_POST['historyHack']) ?></li>
                                </ul>
                                <li>Votre expérience dans la programmation et/ou l'informatique :</li>
                                <ul>
                                    <li><?= htmlspecialchars($_POST['expInfo']) ?></li>
                                </ul>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>