<a href="?r=item/additem">Add an item</a>
</br>
<h2>List of items</h2>

<?php
echo "<table>";
foreach($data as $item) {
	echo "<tr>";
	echo "<td><a href='?r=item/view&id=".$item->iditem."'>".$item->brand." - ".$item->model."</a></td>";
	echo "<td><a href='?r=category/view&id=".$item->category->idcategory."'>".$item->category->name."</a></td>";
	echo "<td>".$item->state."</td>";
	echo "<td>".$item->price."</td>";
	echo "</tr>";
}
echo "</table>";
