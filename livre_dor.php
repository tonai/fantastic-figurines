<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Fantastic figurines</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	   <meta name="author" content="Tonaï" />
	   <meta name="description" content="Site personnel réservé exclusivement à la peinture de figurines fantastiques." />
	   <meta name="keywords" content="figurines, fantastiques, peinture, tonaï, news" />
	   <meta name="reply-to" content="tonai59@hotmail.fr" />
	   <link rel="shortcut icon" type="image/x-icon" href="icone/fantasticfigurines.jpg" />
	   <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
	   <script type="text/javascript" src="livre_dor.js"></script>
	   <script type="text/javascript" src="ajax.js"></script>
	   
   </head>
   <body>
		<?php include('menu.html');?>
		<div id="corps">
			<h1>Livre d'or</h1>
			<p>Dans cette section, vous pourrez laisser tout vos petits messages publics.</p>
			<p>Pour laisser un message, rien de plus simple :</p>
			<ol>
				<li>Cliquez sur "afficher le formulaire".</li>
				<li>Indiquez votre pseudo.</li>
				<li>Tapez votre message.</li>
				<li>Si vous n'ètes pas satisfait, appuyez alors sur effacer.</li>
				<li>Puis cliquez sur envoyer et c'est parti!</li>
			</ol>
			<p><input type="submit" value="Afficher le formulaire" onClick="javascript:formulaire()" id="bouton1"/>    <input type="submit" value="Afficher les messages" onClick="javascript:messages()" id="bouton2"/></p>
			<?php
			if (isset($_POST['pseudo']) and isset($_POST['message'])) //isset($_POST['pseudo']) and isset($_POST['message'])
			{
				if ($_POST['pseudo']!=null and $_POST['message']!=null)
				{
					$pseudo=$_POST['pseudo']; //$pseudo=mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
					$message=$_POST['message']; //$message=mysql_real_escape_string(htmlspecialchars($_POST['message']));
					mysql_connect("localhost", "fantasticfigurines", "chouchou");
					mysql_select_db("fantasticfigurines");
					mysql_query("INSERT INTO livredor VALUES('', '$pseudo', '$message')");
					mysql_close();
				}
				elseif ($_POST['pseudo']==null)
				{
					echo '<p id="erreur">Il faut rentrer un pseudo!</p>';
				}
				elseif ($_POST['message']==null)
				{
					echo '<p id="erreur">Il faut écrire un message...</p>';
				}
			}
			?>
			<form action="livre_dor.php" method="post" id="form" style="display:none">
				<fieldset>
					<legend>Pour ajouter un message :</legend>
					<p><label for="pseudo" >Pseudo : <input type="text" name="pseudo" /></label></p>
					<p><label for="message" >Message : <textarea type="text" name="message" rows="10" cols="50" ></textarea></label></p>
					<p><input type="submit" value="envoyer" />	<input type="reset" value="effacer" /></p>
				</fieldset>
			</form>
			<div id="div" style="display:none">
				<h3>Messages laissés à ce jour :</h3>
				<p>
					<?php
						mysql_connect("localhost", "fantasticfigurines", "chouchou");
						mysql_select_db("fantasticfigurines");
						$reponse=mysql_query("SELECT COUNT(*) AS nb_messages FROM livredor");
						$donnees = mysql_fetch_array($reponse);
						$totaldesmessages = $donnees['nb_messages'];
						$nbmess=10;
						$nbpage=ceil($totaldesmessages/$nbmess);
						for($i=1;$i<=$nbpage;$i++)
						{
							echo '<span onClick="go(this)" id="'.$i.'">page '.$i.' </span>';
							echo ' ';
						}
						mysql_close();
					?>
				</p>
				<dl id="dl">
				</dl>
			</div>
			<a href="#head">UP!</a>
		</div>
   </body>
</html>