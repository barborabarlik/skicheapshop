<?php

class CategoryController extends Controller {


	public function index() {
		$this->render("index", Category::findAll());
	}

	public function view() {
		try {
			$list = Category::findItems($_GET["id"]);
			if($list != "no result"){
				$list["title"] = "Items for ".$list[0]->category->name." category";
				(new ItemController())->render("index", $list);
			}
			else {
				$_POST["error"] = "No item is this category.";
				$this->render("view", $_POST);
			}
		} catch (Exception $e) {
			(new SiteController())->render("index");
		}
	}
}
