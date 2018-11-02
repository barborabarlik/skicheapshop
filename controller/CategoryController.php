<?php

class CategoryController extends Controller {


	public function index() {
		$this->render("index", Category::findAll());
	}

	public function view() {
		try {
			$list = Category::findItems($_GET["id"]);
			if(!empty($list)){
				var_dump($list);
				$list["title"] = "Items for ".$list[0]->category->name." category";
				(new ItemController())->render("index", $list);
			}
			else {
				$_POST["error"] = "Unknow or empty category";
				(new SiteController())->render("index", $_POST);
			}
		} catch (Exception $e) {
			(new SiteController())->render("index");
		}
	}
}
