<?php

class CategoryController extends Controller {


	public function index() {
		$this->render("index", Category::findAll());
	}

	public function view() {
		try {
			$c = new Category(parameters()["id"]);
			$this->render("view", $c);
		} catch (Exception $e) {
			(new SiteController())->render("index");
			// $this->render("error");
		}
	}
}
