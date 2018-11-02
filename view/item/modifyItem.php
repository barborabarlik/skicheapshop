<h2>Modify an item</h2>

<form method="post" action="?r=item/confirm&id=<?php echo $_GET["id"] ?>">
	<label name="brand">Brand :</label>
	<input type="text" name="brand" value="<?php echo $data->brand ?>"/>
	<label name="model">Model :</label>
	<input type="text" name="model" value="<?php echo $data->model ?>"/>
	<label name="category">Category :</label>
	<select name="category" >
	<?php foreach(Category::findAll() as $category){
		echo "<option value='".$category->idcategory."'";
		if($data->category == $category->idcategory){
			echo "selected";
		}
		echo ">".$category->name."</option>";
	} ?>
</select>
	<label name="state">Condition :</label>
	<select name="state" >
		<?php
		$states = array("New","Good","Used","Bad","Shitty");
		foreach ($states as $key => $value) {
			echo "<option value='".$value."'";
			if($data->state == $value){
				echo "selected";
			}
			echo ">".$value."</option>";
		}
		?>
	</select>
	<label name="description">Description :</label>
	<textarea name="description"><?php echo $data->description ?></textarea>
	<label name="price">Price :</label>
	€<input type="text" name="price" value="<?php echo $data->price ?>"/>
	<input type="submit" name ="action" value="Modify">
</form>

<?php  ?>
