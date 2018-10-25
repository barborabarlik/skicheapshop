<?php

class GameController extends Controller {


	public function index() {
		$this->render("index", Game::findAll());
	}

	public function view() {
		try {
			$b = new Game(parameters()["id"]);
			$this->render("view", $b);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}
	
	public function addGame(){
		$this->render("addGame");
	}
	
	public function confirm(){
		if($_POST["action"]=="Ajouter"){
			$game = new Game();
			$game->__set("categorie", new Categorie($_POST["categorie"]));
			$game->__set("name", $_POST["name"]);
			$this->render("index", Game::findAll());
			var_dump($_POST);
		}
		// else if($_POST["action"]=="Supprimer"){
			// $query = "delete from game where idgame=".$_GET["idgame"];
			// db()->exec($query);
		// }

		else $this->render("addGame");
	}
	
	public function delete(){
		$query = "delete from game where idgame=".$_GET["id"];
		db()->exec($query);
		$this->render("index", Game::findAll());
	}
	
}


