
<?php
    session_start(); /* Ouverture de la session pour afficher les informations à l'utilisateur */
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire de Contact</title>
        <meta charset="utf-8">
        <html lang="fr">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <link rel="stylesheet" href="./css/style.css" /> <!-- Emplacement du fichier CSS -->
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    </head>

    <body>

        <div id="main">
            
            <article id="contact" class="panel">


                <!-- Titre du formulaire de contact avec effet néon -->
                <header>	
                    <div class="effetneon">
                        <p>Formulaire</p>
                        <span>Contact</span>
                    </div>			    
                </header>

                    <!-- Affichage de l'erreur -->
                    <?php if(array_key_exists('errors', $_SESSION)): ?>
                        <div class="alert alert-danger"> <!-- Alerte en ROUGE -->
                            <?= implode('<br>', $_SESSION['errors']); ?>
                        </div>
                    <?php unset($_SESSION['errors']); endif; ?> <!-- Permet de faire disparaitre l'erreur -- Qu'elle ne persiste pas -->

                    <!-- Affichage de la confirmation -->
                    <?php if(array_key_exists('success', $_SESSION)): ?>
                        <div class="alert alert-success"> <!-- Alerte en ROUGE -- Message pour informer l'utilisateur que le mail a bien été envoyé -->
                            <h3>Merci, votre message a bien été envoyé &#x1F92A;</h3>
                        </div>
                    <?php unset($_SESSION['success']); endif; ?> <!-- Permet de faire disparaitre l'erreur -- Qu'elle ne persiste pas -->

                <!-- Partie qui traitera les données du formulaire -->
                <div class="starter-template">
                        
                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                    <form action="post_contact.php" method="POST"> <!-- Page qui traitera les données POST_CONTACT.PHP -->

                            <div class="row">

                                <!-- Champ pour renseigner le NOM -->
                                <div class="nom">
                                    <div class="form-group">
                                        <label></label><br>
                                        <input required type="text" pattern="^[A-Za-zÀ-ÿ ,.'-]+$" title="Tu sais lire ? Ton NOM ! -_-" maxlength=10 placeholder="Nom" name="name" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>"></input>
                        <!-- Obliger à remplir le champ REQUIRED --><!------- REGEX refusant certains caractères + Message d'erreur --><!-- MAX 10 caractères -->                                                                  <!----------------------------- Ternaire PHP --------------------------------->
                                        <span id="compteur_name"></span><!-- Compteur -->  
                                    </div>
                                </div>

                                <!-- Champ pour renseigner le PRENOM -->
                                <div class="prenom">
                                    <div class="form-group">
                                        <label></label><br>
                                        <input required type="text" pattern="^[A-Za-zÀ-ÿ ,.'-]+$" title="Tu sais lire ? Ton PRENOM ! -_-" maxlength=10 placeholder="Prénom" name="firstname" class="form-control" id="inputfirstname" value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname'] : ''; ?>"></input>
                        <!-- Obliger à remplir le champ REQUIRED --><!------- REGEX refusant certains caractères + Message d'erreur -----><!-- MAX 10 caractères -->                                                                               <!----------------------------- Ternaire PHP ------------------------------------------->           
                                        <span id="compteur_firstname"></span><!-- Compteur -->
                                    </div>
                                </div>

                                <!-- Champ pour renseigner L'EMAIL -->
                                <div class="email">
                                    <div class="form-group">
                                        <label for="inputemail"></label><br>
                                        <input type="email" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})" title="Tu sais lire ? Ton EMAIL ! -_-" maxlength=30 placeholder="Email" name="email" required class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>"></input>
                        <!-- Obliger à remplir le champ REQUIRED -- Type EMAIL forcer syntaxe MAIL VERIF --><!------- REGEX refusant certains caractères + Message d'erreur ----->                        <!-- MAX 30 caractères -->                                                                               <!----------------------------- Ternaire PHP ----------------------------------->
                                    </div>
                                </div>

                                <!-- Champ du MESSAGE -->
                                <div class="message">
                                    <div class="form-group">
                                        <label for="inputmessage"></label><br>
                                        <input type="text" required id="inputmessage" pattern="^[\s\S]{10,}" title="MIN 10 MAX 50 caractères -_-" maxlength=50 placeholder="Votre message" name="message" class="form-control"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></input>
                                        <!-- Obliger à remplir le champ REQUIRED --><!-- REGEX Limiter le nombre de caractère du message MIN 10 --><!-- MAX 50 caractères -->                                                      <!----------------------------- Ternaire PHP --------------------------------------------->
                                        <span id="compteur_message"></span><!-- Compteur -->
                                    </div>    
                                </div>

                                <!-- Bouton ENVOYER -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                                <progress id="prog" max=100>

                            </div>

                    </form>

                    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

                <!-- Diagnostic --------------------->
                <div id=cadre>

                    <div id=msg_error>

                    <!-- VAR_DUMP -->

                    </div>

                </div>
                <!----------------------------------->

            </article>

        </div>

    </body>

</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<script src="./js/script.js"></script> <!-- Emplacement du fichier JS -->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<!-- Nettoyage de la session -- Défaire les inputs, success ainsi que les erreurs -->
<?php
    unset($_SESSION['inputs']); /* Clean des inputs */
    unset($_SESSION['success']); /* Clean des success */
    unset($_SESSION['errors']); /* Clean des errors */
?>