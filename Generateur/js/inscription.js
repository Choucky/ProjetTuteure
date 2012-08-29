/*====== AJAX de la page inscription.php ======*/

var loginValid = false;

//===================================================
//               checkLogin(login)
//---------------------------------------------------
// Permet de vérifier si le login existe déjà ou pas
// Appel : onKeyUp(this.value) -> ../inscription.php
// AJAX : repInscription.php
//===================================================

function checkLogin( login )
{
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var response = xmlhttp.responseText;

            if( response != "exists" )
            {
                document.getElementById( "loginConfirmImg" ).innerHTML = "<img src='images/dialog-ok.png' alt='ok' />";

                loginValid = true;
            }
            else
            {
    document.getElementById( "loginConfirmImg" ).innerHTML = "<img src='images/dialog-wrong.png' alt='wrong' />";

                loginValid = false;
            }
        }
    }
    xmlhttp.open("GET","js/respInscription.php?action=checkLogin&login=" + encodeURIComponent(login),true);
    xmlhttp.send();  

    return isValid; 
}


//===================================================
//               checkMail(mail)
//---------------------------------------------------
// Permet de vérifier si l'adresse mail a bien une
// forme conforme aux standards.
// Appel : onKeyUp(this.value) -> ../inscription.php
//===================================================

function checkMail( mail )
{
    // Exrpession RegExp pour vérifier la composition de l'adresse mail
    var patt = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if( patt.test(mail) )
    {
        document.getElementById( "mailConfirmImg" ).innerHTML = "<img src='images/dialog-ok.png' alt='ok' />";

        return true;
    }
    else
    {
        document.getElementById( "mailConfirmImg" ).innerHTML = "<img src='images/dialog-wrong.png' alt='wrong' />";

        return false;
    }
}

//===================================================
//               checkPassword(pwd2)
//---------------------------------------------------
// Permet de vérifier si les champs pwd sont corrects
// Appel : onKeyUp(this.value) -> ../inscription.php
//===================================================

function checkPassword( pwd2 )
{
    var pwd1 = document.getElementById( "pwd" ).value;

    if( pwd1 == pwd2 )
    {
        document.getElementById( "pwdConfirmImg" ).innerHTML = "<img src='images/dialog-ok.png' alt='ok' />";
        return true;
    }
    else
    {
        document.getElementById( "pwdConfirmImg" ).innerHTML = "<img src='images/dialog-wrong.png' alt='wrong' />";
        return false;
    }
}


//===================================================
//               validInscription()
//---------------------------------------------------
// Permet d'inscrire l'utilisateur si tout est
// correcte
// Appel : onClick(this.value) -> ../inscription.php
//===================================================

function validInscription()
{
    var login = document.getElementById( "login" ).value;
    var mail = document.getElementById( "mail" ).value;
    var pwd = document.getElementById( "pwdConfirm" ).value;

    if( loginValid && checkMail( mail ) && checkPassword( pwd ) )
    {
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {

                var response = xmlhttp.responseText;

                if( response == "error" )
                {
                    alert( "L'inscription a échoué. Veuillez ré-essayer de vous enregistrer un peu plus tard.");
                }
                else
                {
                    alert( "Vous avez bien été inscrit ! Nous vous invitons à vous connecter dans la partie \"Se connecter\" du site." );  
                }
            }
        }
        xmlhttp.open("GET","js/respInscription.php?action=validInscription&login=" + encodeURIComponent(login) + "&mail=" + encodeURIComponent(mail) + "&pwd=" + encodeURIComponent(pwd),true);
        xmlhttp.send();  
    }
    else
    {
        alert( "Certains champs ne sont pas valides." );
    }
}
