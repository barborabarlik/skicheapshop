<?php

class ItemController extends Controller {


	public function index() {
		$this->render("index", Item::findAll());
	}

	public function view() {
		try {
			$i = new Item(parameters()["id"]);
			$this->render("view", $i);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}

	public function addItem(){
		$this->render("addItem");
	}

	public function confirm(){
		if($_POST["action"]=="Add"){
			$item = new Item();
			$item->__set("category", new Category($_POST["category"]));
			$item->__set("brand", $_POST["brand"]);
			$item->__set("model", $_POST["model"]);
			$item->__set("state", $_POST["state"]);
			$item->__set("description", $_POST["description"]);
			$item->__set("price", $_POST["price"]);
			$this->render("index", Item::findAll());
			var_dump($_POST);
		}
		// else if($_POST["action"]=="Supprimer"){
			// $query = "delete from item where iditem=".$_GET["iditem"];
			// db()->exec($query);
		// }

		else $this->render("addItem");
	}

	public function delete(){
		$query = "delete from item where iditem=".$_GET["id"];
		db()->exec($query);
		$this->render("index", Item::findAll());
	}

}
