/* Liens avec le HTML */

const compteur_message = document.getElementById('compteur_message'); /* Indique le nombre de caractère à cet emplacement */
const inputmessage = document.getElementById('inputmessage'); /* Compte le nombre de caractère à cet emplacement */

const compteur_name = document.getElementById('compteur_name'); /* Indique le nombre de caractère à cet emplacement */
const inputname = document.getElementById('inputname'); /* Compte le nombre de caractère à cet emplacement */

const compteur_firstname = document.getElementById('compteur_firstname'); /* Indique le nombre de caractère à cet emplacement */
const inputfirstname = document.getElementById('inputfirstname'); /* Compte le nombre de caractère à cet emplacement */

/* --------------------------------------------------------------------------------------------------------------*/

/* Exécution des fonctions */
countName();
countFirstname();
countMessage();

/* --------------------------------------------------------------------------------------------------------------*/

/* Compteur Nom */
function countName() {
    // La fonction count calcule la longueur de la chaîne de caractère contenue dans inputmessage
    var countName = 10-inputname.value.length;
    // Affche cette valeur dans ID=compteur
    compteur_name.innerHTML= countName;

}

inputname.addEventListener('keyup', countName);

/* Compteur Prénom */
function countFirstname() {
    // La fonction count calcule la longueur de la chaîne de caractère contenue dans inputmessage
    var countFirstname = 10-inputfirstname.value.length;
    // Affche cette valeur dans ID=compteur
    compteur_firstname.innerHTML= countFirstname;

}

inputfirstname.addEventListener('keyup', countFirstname);

/* Compteur Message */
function countMessage() {
    // La fonction count calcule la longueur de la chaîne de caractère contenue dans inputmessage
    var countMessage = 50-inputmessage.value.length;
    // Affche cette valeur dans ID=compteur
    compteur_message.innerHTML= countMessage;

}

inputmessage.addEventListener('keyup', countMessage);