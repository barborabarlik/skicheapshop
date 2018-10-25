
<h2>Liste des catégorties de jeux</h2>

<table>
<?php
foreach($data as $categorie) {
	echo "<tr>";
	echo "<td><a href='?r=categorie/view&id=".$categorie->idcategorie."'>".$categorie->name."</a></td>";
	echo "</tr>";
}
?>
</table>
