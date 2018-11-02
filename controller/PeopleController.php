<?php

class PeopleController extends Controller {


	public function index() {
		$this->render("index", People::findAll());
	}

	public function view() {
		try{
			$list = People::findItems($_GET["id"]);
			var_dump($list);
			if(!empty($list)){
				$list["title"] = "Items selling by ".$list[0]->seller->name;
				(new ItemController())->render("index", $list);
			}
			else {
				$_POST["error"] = "Unknow seller";
				(new SiteController())->render("index", $_POST);
			}
		} catch (Exception $e) {
			(new SiteController())->render("index");
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
				$user = People::findByEmail(trim($_POST["email1"]));
				if($user == "no result"){
					$people = new People();
					$people->__set("name", $_POST["name"]);
					$people->__set("email", trim($_POST["email1"]));
					$people->__set("pass", $_POST["password1"]);
					$query = "insert into people (name, email, pass) values('".$_POST["name"]."','"
																																  	.trim($_POST["email1"])."','"
																																  	.$_POST["password1"]."')";
				  db()->exec($query);
					$_POST["info"] = "Account created with success !";
					$_SESSION["user"] = $user->email;
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
			$user = People::findByEmail(trim($_POST["email"]));
			if($user != "no result"){
				if($user->pass == $_POST["password"]){
					$_SESSION["user"] = $user->email;
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

	// public function delete(){
	// 	$query = "delete from people where idpeople=".$_GET["id"];
	// 	db()->exec($query);
	// 	$this->render("index", People::findAll());
	// }

}
