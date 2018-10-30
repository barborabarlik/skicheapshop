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

	public function login(){
		$this->render("login");
	}

	public function logout(){
		unset($_SESSION["user"]);
		(new SiteController())->render("index");
	}

	public function signup(){
		$this->render("signup");
	}

	public function confirm(){
		if($_POST["action"]=="Sign up"){
			if($_POST["email1"] == $_POST["email2"] && $_POST["password1"] == $_POST["password2"]){
				$people = new People();
				$people->__set("name", $_POST["name"]);
				$people->__set("email", $_POST["email1"]);
				$people->__set("pass", $_POST["password1"]);
				$query = "insert into people (name, email, pass) values('".$_POST["name"]."','"
																																  .$_POST["email1"]."','"
																																  .$_POST["password1"]."')";
				var_dump($query);
				db()->exec($query);
				$_POST["info"] = "Account created with success !";
				(new SiteController())->render("index", $_POST["info"]);
			}
			else{
				$_POST["error"] = "Email addresses or passwords are not identic, try again.";
				$this->render("signup", $_POST);
			}
		}
		else if($_POST["action"]=="Login"){
			$valueTemp = People::findByEmail(trim($_POST["email"]));
			if($valueTemp != "no result"){
				if($valueTemp->pass == $_POST["password"]){
					$_SESSION["user"] = $valueTemp->email;
					(new SiteController())->render("index");
				}
				else $this->render("login", "Wrong password, try again.");
			} else{
				$this->render("login", "Wrong email, try again.");
			}
		}
		// else if($_POST["action"]=="Supprimer"){
			// $query = "delete from people where idpeople=".$_GET["idpeople"];
			// db()->exec($query);
		// }
	}

	public function delete(){
		$query = "delete from people where idpeople=".$_GET["id"];
		db()->exec($query);
		$this->render("index", People::findAll());
	}

}
