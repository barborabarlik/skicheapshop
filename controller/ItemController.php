<?php

class ItemController extends Controller {


	public function index() {
		$list = Item::findAll();
		$list["title"] = "All items";
		$this->render("index", $list);
	}

	public function view() {
		try {
			$item = Item::findByID($_GET["id"]);
			// if($list != "no result"){
				$this->render("view", $item);
			// }
			// else {
			// 	$_POST["error"] = "No item found.";
			// 	$this->render("view", $_POST);
			// }
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}

	public function modify() {
		try {
			$i = new Item(parameters()["id"]);
			$this->render("modifyitem", $i);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}

	public function addItem(){
		$this->render("addItem");
	}

	public function modifyItem(){
		$this->render("modifyItem");
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
			$query = "insert into item (brand, model, category, state, description, price) values('".$_POST["brand"]."',
																																														'".$_POST["model"]."',
																																														".$_POST["category"].",
																																														'".$_POST["state"]."',
																																														'".$_POST["description"]."',
																																														".$_POST["price"]."
																																														)";
			db()->exec($query);
			$this->render("index", Item::findAll());
		}
		else if($_POST["action"]=="Modify"){
			$item = new Item();
			$item->__set("category", new Category($_POST["category"]));
			$item->__set("brand", $_POST["brand"]);
			$item->__set("model", $_POST["model"]);
			$item->__set("state", $_POST["state"]);
			$item->__set("description", $_POST["description"]);
			$item->__set("price", $_POST["price"]);
			$query = "update item set brand = '".$_POST["brand"]."',
																model = '".$_POST["model"]."',
																category = '".$_POST["category"]."',
																state = '".$_POST["state"]."',
																description = '".$_POST["description"]."',
																price = ".$_POST["price"]."
								where iditem = ".$_GET["id"];
			db()->exec($query);
			$this->view();
		}
		else (new SiteController())->render("index");
	}

	public function delete(){
		$i = new Item(parameters()["id"]);
		$i->deleteWithID();
		$this->render("index", Item::findAll());
	}

}
