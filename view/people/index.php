<h2>List of all users</h2>

<?php
if(isset($_SESSION["user"])){
	echo "<table>";
	foreach($data as $people) {
		echo "<tr>";
		echo "<td><a href='?r=people/view&id=".$people->idpeople."'>".$people->name."</a></td>";
		echo "</tr>";
	}
	echo "</table>";
}
else echo "<h3> You must be connected to see all peoples.</h3>";
?>
