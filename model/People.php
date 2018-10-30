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

}
