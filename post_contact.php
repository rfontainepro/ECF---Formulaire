<?php

/* TABLEAU contenant les erreurs potentielles */
$errors = []; /* Si tableau vide = Pas d'erreur */

/* Si la CLEF ou que le champs est NUL = ERROR */

/* CHECK champ NAME */
if (!array_key_exists('name', $_POST) || $_POST['name'] == ''){
    
    $errors['name'] = "Vous n'avez pas renseigné votre nom"; /* MESSAGE ERREUR pour l'utilisateur */
}

/* CHECK champ MAIL */
if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ /* Filtre PHP pour la vérification de l'email */
    
    $errors['email'] = "Vous n'avez pas renseigné un email valide"; /* MESSAGE ERREUR pour l'utilisateur */
}

/* CHECK champ MESSAGE */
if (!array_key_exists('message', $_POST) || $_POST['message'] == ''){

    $errors['message'] = "Vous n'avez pas renseigné votre message"; /* MESSAGE ERREUR pour l'utilisateur */
}

session_start(); /* Session pour stocker les différentes erreurs */

/* RENVOIE vers la page précédente en cas d'erreur(s) */
if (!empty($errors)){
    
    $_SESSION['errors'] = $errors; /* Tableau contenant les différentes erreurs à afficher */
    $_SESSION['inputs'] = $_POST; /* Permet de conserver les informations saisient lors d'un renvoi sur le formulaire en cas d'erreur(s) */
    header('Location: index.php'); /* Redirection URL */
}

else {

    $_SESSION['success'] = 1; /* CLEF 1 pour dire que c'est OK -- Si clef n'existe pas = Erreur */

    /* ------------------------------------------------------------- Récupération des données du FORMULAIRE --- */
    $message = $_POST['message']; /* Récupération du message */
    $email = $_POST['email']; /* Récupération de l'email */
    $name = $_POST['name']; /* Récupération du nom */
    $firstname = $_POST['firstname']; /* Récupération du prénom */

    /* ---------------------------------------------------------------------- Personnalisation du MAIL -------- */
    $full_name = $firstname.' '.$name; /* FUSION du prénom + nom */
    $all_info = $full_name.' ( '.$email.' ) vous a écrit un message :
    
    '.$message; /* FUSION du message + email + nom + prénom et création d'une phrase incluant les 4 élémants */
    /* -------------------------------------------------------------------------------------------------------- */
    
    $headers = 'FROM: oxbe74@gmail.com'; /* L'expéditeur */
    mail('k.ceriati@onlineformapro.com', 'Formulaire de Merde', $all_info, $headers); /* MAIL qui va recevoir le FORMULAIRE */
    header('Location: index.php'); /* Redirection URL */
}

/* ------------------------------ */
/* Diagnostic */
/* ------------------------------ */

/* var_dump($errors);
/* die(); */
/* echo($_COOKIE);
/* ----------------------------- */