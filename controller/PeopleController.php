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
				$valueTemp = People::findByEmail(trim($_POST["email1"]));
				if($valueTemp == "no result"){
					$people = new People();
					$people->__set("name", $_POST["name"]);
					$people->__set("email", trim($_POST["email1"]));
					$people->__set("pass", $_POST["password1"]);
					$query = "insert into people (name, email, pass) values('".$_POST["name"]."','"
																																  	.trim($_POST["email1"])."','"
																																  	.$_POST["password1"]."')";
				  db()->exec($query);
					$_POST["info"] = "Account created with success !";
					(new SiteController())->render("index", $_POST);
				}
				else{
					$_POST["error"] = "This email address is not available, try again.";
					$this->render("signup", $_POST);
				}
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
				else{
					$_POST["error"]="Wrong password, try again.";
					$this->render("login", $_POST);
				}
			} else{
				$_POST["error"]="This account does not exist, try again.";
				$this->render("login", $_POST);
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
