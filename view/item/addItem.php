<h2>Add an item</h2>

<form method="post" action="?r=item/confirm">
	<label name="brand">Brand :</label>
	<input type="text" name="brand"/>
	<label name="model">Model :</label>
	<input type="text" name="model"/>
	<label name="categorie">Catégorie :</label>
	<select name="categorie" >
	<?php foreach(Category::findAll() as $category){
		echo "<option value=".$category->idcategory.">".$category->name."</option>";
	} ?>
</select>
	<label name="state">Condition :</label>
	<select name="state" >
		<option value="new">"New"</option>
		<option value="good">"Good"</option>
		<option value="used">"Used"</option>
		<option value="bad">"Bad"</option>
		<option value="shitty">"Shitty"</option>
	</select>
	<label name="description">Description :</label>
	<textarea name="description"></textarea>
	<label name="price">Price :</label>
	€<input type="text" name="price"/>
	<input type="submit" name ="action" value="Add">
</form>
