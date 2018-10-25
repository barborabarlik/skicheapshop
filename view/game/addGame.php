<h2>Ajouter un jeu</h2>

<form method="post" action="?r=game/confirm">
	<label name="name">Nom :</label>
	<input type="text" name="name"/>
	<label name="categorie">Catégorie :</label>
	<SELECT name="categorie" >
	<?php foreach(Categorie::findAll() as $categ){
		echo "<option value=".$categ->idcategorie.">".$categ->name."</option>";
	} ?>
	</SELECT>
	<input type="submit" name ="action" value="Ajouter">
</form>