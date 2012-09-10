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

