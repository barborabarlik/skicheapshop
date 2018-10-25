

<h2><?php echo $data->name; ?></h2>
<p>
<?php
echo $data->categorie->name." - ".$data->name." ";

$id=$_GET["id"];
echo "<a href='?r=game/delete&id=".$id."'>Supprimer</a>";
?>
</p>
