<?php

class Item extends Model {

	protected $_iditem;
	protected $_brand;
	protected $_model;
	protected $_category;
	protected $_state;
	protected $_description;
	protected $_price;
	protected $_avaibility;
	protected $_seller;
	protected $_buyer;

	public static function findAll() {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select id$table from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row["id".$table]);
		}
		foreach ($list as $i => $details) {
			$valueTemp = Category::findByID($list[$i]->category);
			$list[$i]->category = $valueTemp;
		}
		return $list;
	}

}
