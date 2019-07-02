<?php
    // Pattern de test :
    // $stringPattern sera utilisé pour le firstName, lastName et society
    $stringPattern = '/^[A-ZÔÖÀÉÈÎÏ]{1}[a-zA-ZéèôöîïçÉÈÎÏ \'-]+([-\'\s][a-zA-ZéèôöîïçÉÈÎÏ \'-][a-zéèôöîïç \']+)?$/';
    $agePattern = '/^[0-9]{2}$/';
    $civilityPattern = '/^[1-2]{1}$/';
    
    $arrayCivility = ['','Madame','Monsieur'];
    $arrayOfErrors = [];
    $validation = false;
    // !preg_match ( string $pattern , string $subject): sert à tester un pattern (regex) et une chaîne de caractères
    // Si l'un des input ne correspond pas au pattern correspondant on reste dans le formulaire
    if ($_POST) {
        // var_dump($_POST);
        if (!preg_match($civilityPattern, $_POST['civility'])){
            $arrayOfErrors['civility'] = 'Civilité invalide';
            $_POST['civility'] = '';
        }
        if (!preg_match($stringPattern, $_POST['lastName'])){
            $arrayOfErrors['lastName'] = 'Nom de famille invalide';
            $_POST['lastName'] = '';
        }
        if (!preg_match($stringPattern, $_POST['firstName'])){
            $arrayOfErrors['firstName'] = 'Prénom invalide';
            $_POST['firstName'] = '';
        }
        if (!preg_match($agePattern, $_POST['age'])){
            $arrayOfErrors['age'] = 'Age invalide';
            $_POST['age'] = '';
        }
        if (!preg_match($stringPattern, $_POST['society'])){
            $arrayOfErrors['society'] = 'Société invalide';
            $_POST['society'] = '';
        }
        // var_dump($arrayOfErrors);
    }
    // var_dump($validation);
    // S'il n'y a pas d'erreurs
    if (empty($arrayOfErrors) && $_POST){
        $validation = true;
    }
