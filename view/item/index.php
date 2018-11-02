<?php if(isset($_SESSION["user"])){ ?>
<a href="?r=item/additem">Add an item</a>
<?php } ?>
<h2><?php if(isset($data["title"])) { echo $data["title"]; } else { echo "All items";} ?></h2>

<?php
echo "<table>";
foreach($data as $item){
	if(is_object($item)){
		echo "<tr>";
		echo "<td><a href='?r=item/view&id=".$item->iditem."'>".$item->brand." - ".$item->model."</a></td>";
		echo "<td><a href='?r=category/view&id=".$item->category->idcategory."'>".$item->category->name."</a></td>";
		echo "<td>".$item->state."</td>";
		echo "<td>€".$item->price."</td>";
		//echo "<td><a href='?r=item/modify&id=".$item->iditem."'>Modify</a></td>";
		//echo "<td><a href='?r=item/delete&id=".$item->iditem."'>Delete</a></td>";
		echo "</tr>";
	}
}
echo "</table>";
