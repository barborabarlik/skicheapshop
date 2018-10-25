

<h2>Liste des bières</h2>

<?php
if(isset($_SESSION["user"])){
	echo "<table>";
	foreach($data as $beer) {
		echo "<tr>";
		echo "<td><a href='?r=beer/view&id=".$beer->idbeer."'>".$beer->name."</a></td>";
		echo "<td>".$beer->degree."°</td>";
		echo "<td>".$beer->brewery->name."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
else echo "<h3> Vous devez être connecté pour voir les bières.</h3>";
?>

