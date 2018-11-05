<?php

class CategoryController extends Controller {


	public function index() {
		$this->render("index", Category::findAll());
	}

	public function view() {
			$list = Category::findItems($_GET["id"]);
			if(!empty($list)){
				$list["title"] = "Items for ".$list[0]->category->name." category";
				(new ItemController())->render("index", $list);
			}
			else {
				$_POST["error"] = "Unknow or empty category";
				$this->render("index", Category::findAll());
			}
	}
}
