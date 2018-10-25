<?php

class PeopleController extends Controller {


	public function index() {
		$this->render("index", People::findAll());
	}

	public function view() {
		try {
			$p= new People(parameters()["id"]);
			$this->render("view", $p);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}

	public function addPeople(){
		$this->render("addPeople");
	}

	public function confirm(){
		if($_POST["action"]=="Add"){
			$people = new People();
			$people->__set("name", $_POST["name"]);
			$people->__set("email", $_POST["email"]);
			$people->__set("pass", $_POST["pass"]);
			$this->render("index", People::findAll());
			var_dump($_POST);
		}
		// else if($_POST["action"]=="Supprimer"){
			// $query = "delete from people where idpeople=".$_GET["idpeople"];
			// db()->exec($query);
		// }

		else $this->render("addPeople");
	}

	public function delete(){
		$query = "delete from people where idpeople=".$_GET["id"];
		db()->exec($query);
		$this->render("index", People::findAll());
	}

}
