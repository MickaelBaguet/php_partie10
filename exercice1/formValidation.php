<?php
    $accentedCharacters = 'àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ';
    // Pattern de test :
    // $stringPattern sera utilisé pour le firstName, lastName, countryOfBirth, nationality
    $stringPattern = '/^[A-ZÔÖÀÉÈÎÏ][a-zA-ZéèôöîïçÉÈÎÏ \'-]+([-\'\s][a-zA-ZéèôöîïçÉÈÎÏ \'-][a-zéèôöîïç \']+)?$/';
    $emailPattern = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
    $datePattern = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
    $phonePattern = '/^[0][0-9]{9}$/';
    $idPoleEmploiPattern = '/^[0-9]{7}[A-Z]{1}$/';
    $urlPattern = '/^https:\/\/codecademy\.com\/user\/[a-z0-9][a-z0-9_-]*$/' ;
    $addressPattern = '/^[a-zA-Z0-9][a-zA-Z'.$accentedCharacters.'0-9 \'-]*$/';
    $numberPattern = '/^[0-9]+$/';
    $degreePattern = '/^[0-1-2-3-4]{1}$/';
    // Tableau regroupant les différents phrases en fonction du diplôme
    $arrayDegree = ['Vous n\'avez pas de diplôme','Vous avez un Bac','Vous avez un Bac+2','Vous avez un Bac+3','Vous avez un Bac+5 ou supérieur'];
    // Tableau (associatif) regroupant les messages d'errreurs
    $arrayOfErrors = [];
    // Variable servant à savoir si le formulaire est correctement rempli ou non
    $validation = false;
    // !preg_match ( string $pattern , string $subject): sert à tester un pattern (regex) et une chaîne de caractères
    // Si le formulairea été POST :
    if ($_POST) {
        // var_dump($_POST);
        // On test chaque input en fonction de son pattern et s'il ne correspond pas on insert un message d'erreur ...
        // ... et on réinitialise le POST afin de ne pas la garder dans le champ
        if (!preg_match($stringPattern, $_POST['lastName'])){
            $arrayOfErrors['lastName'] = 'Nom de famille invalide';
            $_POST['lastName'] = '';
        }
        if (!preg_match($stringPattern, $_POST['firstName'])){
            $arrayOfErrors['firstName'] = 'Prénom invalide';
            $_POST['firstName'] = '';
        }
        if (!preg_match($datePattern, $_POST['dateOfBirth'])){
            $arrayOfErrors['dateOfBirth'] = 'Date de naissance invalide';
            $_POST['dateOfBirth'] = '';
        }
        if (!preg_match($stringPattern, $_POST['countryOfBirth'])){
            $arrayOfErrors['countryOfBirth'] = 'Pays de naissance invalide';
            $_POST['countryOfBirth'] = '';
        }
        if (!preg_match($stringPattern, $_POST['nationality'])){
            $arrayOfErrors['nationality'] = 'Nationalité invalide';
            $_POST['nationality'] = '';
        }
        if (!preg_match($addressPattern, $_POST['address'])){
            $arrayOfErrors['address'] = 'Adresse invalide';
            $_POST['address'] = '';
        }
        if (!preg_match($emailPattern, $_POST['email'])){
            $arrayOfErrors['email'] = 'Email invalide';
            $_POST['email'] = '';
        }
        if (!preg_match($phonePattern, $_POST['phone'])){
            $arrayOfErrors['phone'] = 'Numéro de téléphone invalide';
            $_POST['phone'] = '';
        }
        if (!preg_match($degreePattern, $_POST['degree'])){
            $arrayOfErrors['degree'] = 'Diplôme invalide !';
            $_POST['degree'] = '';
        }
        if (!preg_match($idPoleEmploiPattern, $_POST['idPoleEmploi'])){
            $arrayOfErrors['idPoleEmploi'] = 'Numéro Pôle Emploi invalide';
            $_POST['idPoleEmploi'] = '';
        }
        if (!preg_match($urlPattern, $_POST['likeCodeAc'])){
            $arrayOfErrors['linkCodeAc'] = 'URL invalide';
            $_POST['linkCodeAc'] = '';
        }
        // filter_input: sert à tester si un INPUT_POST est bien d'un type FILTER_VALIDATE
        if (!filter_input(INPUT_POST, 'numberBadge', FILTER_VALIDATE_INT)){
            $arrayOfErrors['numberBadge'] = 'Nombre de badge invalide !';
            $_POST['numberBadge'] = '';
        }
        if (empty($_POST['heroOrNot'])){
            $arrayOfErrors['heroOrNot'] = 'Veuillez remplir le champ';
        }
        if (empty($_POST['historyHack'])){
            $arrayOfErrors['historyHack'] = 'Veuillez remplir le champ';
        }
        if (empty($_POST['expInfo'])){
            $arrayOfErrors['expInfo'] = 'Veuillez remplir le champ';
        }
        // var_dump($arrayOfErrors);
    }
    // var_dump($validation);
    // S'il n'y a pas d'erreurs et que le formulaire à bien été envoyé ...
        // ... alors la variable servant de validation passe à true
    if (empty($arrayOfErrors) && $_POST){
        $validation = true;
    }
