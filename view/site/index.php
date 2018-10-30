<h2>Welcome !</h2>

<?php if(!isset($_SESSION["user"])){
  echo "<a href='?r=people/signup'>Sign up</a>";
}
?>
