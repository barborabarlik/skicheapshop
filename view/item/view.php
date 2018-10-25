

<h2><?php echo $data->brand; ?> - <?php echo $data->model; ?></h2>
<p>
<p>
  Condition : <?php .$data->state; ?>
</p>
<p>
  <?php .$data->price; ?>€
</p>
</p>
<p>
Seller : <?php .$data->seller; ?>
</p>
<p>
<?php .$data->description; ?>
</p>

<p>
<?php
$id=$_GET["id"];
echo "<a href='?r=item/delete&id=".$id."'>Delete</a>";
?>
</p>
