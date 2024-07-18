function getXhr()
{
	var xhr = null; 
	if(window.XMLHttpRequest) // Firefox et autres
		xhr = new XMLHttpRequest(); 
		else if(window.ActiveXObject) // Internet Explorer 
		{
			try
			{
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (e)
			{
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		else // XMLHttpRequest non support� par le navigateur 
		{
			alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
			xhr = false; 
		}
	return xhr
}

function go(page)
{
	var xhr = getXhr()
	// On d�fini ce qu'on va faire quand on aura la r�ponse
	xhr.onreadystatechange = function()
	{
		// On ne fait quelque chose que si on a tout re�u et que le serveur est ok
		if(xhr.readyState == 4 && xhr.status == 200)
		{
			leselect=xhr.responseText;
			document.getElementById('dl').innerHTML = leselect;
		}
	}
	xhr.open("POST","ajax.php",true);
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	var id=page.getAttribute("id");
	//alert(id);
	xhr.send("id="+id);
}