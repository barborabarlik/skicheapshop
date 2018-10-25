<?php

class CategorieController extends Controller {


	public function index() {
		$this->render("index", Categorie::findAll());
	}

	public function view() {
		try {
			$b = new Categorie(parameters()["id"]);
			$this->render("view", $b);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}
}


