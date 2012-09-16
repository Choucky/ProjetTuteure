/*====== AJAX de la page webSite.php ======*/

//===================================================
//               replaceInfo()
//---------------------------------------------------
// Permet de mettre les bonnes infos sur le design
// Appel : onload(this.value) -> ../webSite.php
// AJAX : repWebSite.php
//===================================================

function replaceInfo()
{
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var response = xmlhttp.responseText;
            
            var tab = response.split("<split/>");
            if( response != "error" )
            {
                document.getElementById("title").innerHTML = tab[0]; 
                document.getElementById("section").innerHTML = tab[1];
                document.getElementById("sidebar").innerHTML = tab[2];
                document.getElementById("tagline").innerHTML = tab[3];
                document.getElementById("footer-outer-block").innerHTML = tab[4];
            }
        }
    }
    xmlhttp.open("GET","js/respWebSite.php?action=replaceInfo&idinfo=" + encodeURIComponent(document.getElementById("idInfo").value),true);
    xmlhttp.send();
}


//===================================================
//               modifyField( id, text)
//---------------------------------------------------
// Permet la modification en temps réel d'un champ
// dont l'id est donné en parametre.
// id : valeur de l'id recherché
// text : valeur a remplacer dans la balise id
// Appel : onChange(this.value) -> ../webSite.php
//===================================================

function modifyField( id, text )
{
    responseText = text.replace(/ /g, '&nbsp;');
    responseText = responseText.replace(/\n/g, '<br />');
    responseText = responseText.replace("<img&nbsp;src=", '<img src=');
    document.getElementById(id).innerHTML = responseText;
}


//===================================================
//               modifyBold( id )
//---------------------------------------------------
// Permet d'insérer les balises pour mettre les
// caractères en gras.
// id : valeur de l'id recherché
// Appel : onClick(this.value) -> ../webSite.php
//===================================================

function modifyBold( id )
{
    document.getElementById(id).value += "<b></b>";
}


//===================================================
//               modifyItalic( id )
//---------------------------------------------------
// Permet d'insérer les balises pour mettre les
// caractères en italic.
// id : valeur de l'id recherché
// Appel : onClick(this.value) -> ../webSite.php
//===================================================

function modifyItalic( id )
{
    document.getElementById(id).value += "<em></em>";
}


//===================================================
//               modifyUnderline( id )
//---------------------------------------------------
// Permet d'insérer les balises pour souligner les
// caractères.
// id : valeur de l'id recherché
// Appel : onClick(this.value) -> ../webSite.php
//===================================================

function modifyUnderline( id )
{
    document.getElementById(id).value += "<u></u>";
}


//===================================================
//               modifyImage( id )
//---------------------------------------------------
// Permet d'insérer les balises pour ajouter une
// image.
// id : valeur de l'id recherché
// Appel : onClick(this.value) -> ../webSite.php
//===================================================

function modifyImage( id )
{
    document.getElementById(id).value += "<img src=''/>";
}


//===================================================
//               saveInfos()
//---------------------------------------------------
// Permet de sauvegarder les modifications faites
// Appel : onClick(this.value) -> ../webSite.php
//===================================================

function saveInfos()
{
    var title = document.getElementById("title").innerHTML;
    var section = document.getElementById("section").innerHTML;
    var nav = document.getElementById("sidebar").innerHTML;
    var tagline =  document.getElementById("tagline").innerHTML;
    var footer = document.getElementById("footer-outer-block").innerHTML;
    var idInfo = document.getElementById("idInfo").value;

    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var response = xmlhttp.responseText;

            if( response == "success" )
            {
                alert( "Votre site web a bien ete enregistre." );
            }
            else
            {
                alert( "Une erreur s'est produite lors de l'enregistrement. Veuillez recommencer plus tard." );
            }
        }
    }
    xmlhttp.open("GET","js/respWebSite.php?action=saveInfos&title=" + encodeURIComponent(title) + "&section=" + encodeURIComponent(section) + "&nav=" + encodeURIComponent(nav) + "&tagline=" + encodeURIComponent(tagline) + "&footer=" + encodeURIComponent(footer) + "&idInfo=" + encodeURIComponent(idInfo),true);
    xmlhttp.send();
}


//===================================================
//               saveExit()
//---------------------------------------------------
// Permet de sauvegarder les modifications faites
// si l'utilisateur quitte la page
// Appel : onClick(this.value) -> ../webSite.php
//===================================================

function saveExit()
{

    var resp = confirm("Voulez-vous enregistrer les modifications avant de retourner sur votre wall ?")
    
    if( resp )
    {
        saveInfos();
    }

    location.href='wall.php';
}
