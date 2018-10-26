

<h2><?php echo $data->brand; ?> - <?php echo $data->model; ?></h2>
<p>
<p>
  Condition : <?php echo $data->state; ?>
</p>
<p>
  <?php echo $data->price; ?>€
</p>
</p>
<p>
Seller : <?php echo $data->seller; ?>
</p>
<p>
<?php echo $data->description; ?>
</p>

<p>
<?php
$id=$_GET["id"];
echo "<a href='?r=item/delete&id=".$id."'>Delete</a>";
?>
</p>
