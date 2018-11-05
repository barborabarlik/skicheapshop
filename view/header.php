<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SkiCheapShop</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
	<main>
	<header>
		<h1><a href='?r=site/index'>SkiCheapShop</a></h1>
		<?php
		if(isset($_SESSION["user"])){
			echo "<a href='?r=people/logout'>Log out</a>";
			echo $_SESSION["user"]->email;
		}
		else{
			echo "<a href='?r=people/login'>Log in</a>";
		}
		?>
	</header>
	<nav>
		<ul>
			<li><a href="?r=item">All items</a></li>
			<li><a href="?r=category">Categories</a></li>
			<?php if(isset($_SESSION["user"])){ ?>
			<li><a href="?r=item/additem">Add an item</a></li>
			<?php } ?>
			<?php if(isset($_SESSION["user"])){ ?>
			<li><a href="?r=people/view&id=<?php echo $_SESSION["user"]->idpeople; ?>">My selling items</a></li>
			<?php } ?>
		</ul>
	</nav>
	<div class="message">
		<?php if(isset($_POST["error"])) { echo "<div class='error'>".$_POST["error"]."</div>"; }?>
		<?php if(isset($_POST["info"])) { echo "<div class='info'>".$_POST["info"]."</div>"; }?>
</div>
	<section>
</body>
</html>
