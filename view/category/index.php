
<h2>List of categories</h2>

<table>
<?php
foreach($data as $categoy) {
	echo "<tr>";
	echo "<td><a href='?r=category/view&id=".$category->idcategory."'>".$category->name."</a></td>";
	echo "</tr>";
}
?>
</table>
