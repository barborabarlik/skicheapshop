<?php

class Category extends Model {

	protected $_idcategory;
	protected $_name;

	public static function findItems($id) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select iditem from item join category on item.category = category.idcategory where item.category = '$id'");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = Item::findByID($row["iditem"]);
		}
		return $list;
	}

}
