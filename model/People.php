<?php

class People extends Model {

	protected $_idpeople;
	protected $_name;
	protected $_email;
	protected $_pass;

	public static function findByEmail($email) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table where email = '$email'");
		$st->execute();
		$term = "no result";
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$term = new $class($row["id".$table]);
		}
		return $term;
	}

	public static function findByID($id) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table where id$table = '$id'");
		$st->execute();
		$term = "no result";
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$term = new $class($row["id".$table]);
		}
		return $term;
	}

	public static function findItems($id) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select iditem from item join people on item.seller = people.idpeople where item.seller = '$id'");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = Item::findByID($row["iditem"]);
		}
		return $list;
	}

}
