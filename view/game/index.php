
<a href="?r=game/addGame">Ajouter un jeu</a>
</br>
<h2>Liste des jeux</h2>
<table>
<?php
foreach($data as $game) {
	echo "<tr>";
	echo "<td><a href='?r=game/view&id=".$game->idgame."'>".$game->name."</a></td>";
	echo "<td>".$game->categorie->name."</td>";
	echo "</tr>";
}
?>
</table>
