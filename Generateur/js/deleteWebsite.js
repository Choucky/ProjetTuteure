/*====== AJAX de la page wall.php ======*/

//===================================================
//               validDeleteWebsite()
//---------------------------------------------------
// Permet de supprimer le site Web
// Appel : onClick(this.value) -> ../wall.php
//===================================================

function validDeleteWebsite(idInformation)
{
	
	var response = confirm("Êtes-vous sur de vouloir supprimer votre site Internet ?");
	if (response == true){
	
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				var response = xmlhttp.responseText;
				if (response == "error")
				{
					alert ("[Error] : le site web n'a pas été supprimé.");
				}
				else {
					alert ("Le site web a bien été supprimé !");
					document.location.reload();
				}
    			document.location.reload();
			}
		}
		xmlhttp.open("GET","js/respDelete.php?action=validDeleteWebsite&idInformation=" + encodeURIComponent(idInformation),true);
		xmlhttp.send();
	}
}