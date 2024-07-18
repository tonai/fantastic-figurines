function formulaire()
{
	var form=document.getElementById("form");
	var style=form.getAttribute("style");
	var bouton=document.getElementById("bouton1");
	if (document.all)
	{
		if (style.display=="none")
		{
			style.display="inline";
			bouton.setAttribute('value','Enlever le formulaire');
		}
		else
		{
			style.display="none";
			bouton.setAttribute('value','Afficher le formulaire');
		}
	}
	else
	{
		if (style=="display: none;")
		{
			form.setAttribute('style','display: inline;');
			bouton.setAttribute('value','Enlever le formulaire');
		}
		else
		{
			form.setAttribute('style','display: none;');
			bouton.setAttribute('value','Afficher le formulaire');
		}
	}
}

function messages()
{
	var div=document.getElementById("div");
	var style=div.getAttribute("style");
	var bouton=document.getElementById("bouton2");
	if (document.all)
	{
		if (style.display=="none")
		{
			style.display="inline";
			bouton.setAttribute('value','Enlever les messages');
		}
		else
		{
			style.display="none";
			bouton.setAttribute('value','Afficher les messages');
		}
	}
	else
	{
		if (style=="display: none;")
		{
			div.setAttribute('style','display: inline;');
			bouton.setAttribute('value','Enlever les messages');
		}
		else
		{
			div.setAttribute('style','display: none;');
			bouton.setAttribute('value','Afficher les messages');
		}
	}
}