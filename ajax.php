<?php
	if(isset($_POST['id']))
	{
		mysql_connect("localhost", "fantasticfigurines", "chouchou");
		mysql_select_db("fantasticfigurines");
		$nbdeb=($_POST['id']-1)*10;
		$reponse=mysql_query('SELECT * FROM livredor ORDER BY id DESC LIMIT '.$nbdeb. ', 10');
		$messages=mysql_fetch_array($reponse);
		while($messages['id']!=null)
		{
			echo '<dt><strong>'.nl2br(htmlspecialchars($messages['pseudo'])).' :</strong></dt>';
			echo '<dd>'.nl2br(htmlspecialchars($messages['message'])).'</dd>';
			$messages=mysql_fetch_array($reponse);
		}
		mysql_close();
	}
?>