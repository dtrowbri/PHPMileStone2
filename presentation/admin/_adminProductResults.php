<head>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<table id="customers" class="display">
	<thead>
		<tr>
			<th>ProductName</th>
			<th>Description</th>
			<th>Price</th>
			<th>Edit Product</th>
			<th>Delete Product</th>
		</tr>
	</thead>
<tbody>
<?php
for($i = 0; $i < count($results); $i++){
    echo "<tr>";
    echo "<td>" . $results[$i]->getName() . "</td>";
    echo "<td>" . $results[$i]->getDescription() . "</td>";
    echo "<td>" . $results[$i]->getPrice() . "</td>";
    echo '<td><form action="../admin/EditProduct.php" method="post">';
    echo '<input type="hidden" name="productId" value = "' . $results[$i]->getId() . '">';
    echo '<input type="hidden" name="productName" value = "' . $results[$i]->getName() . '">';
    echo '<input type="hidden" name="productDescription" value = "' . $results[$i]->getDescription() . '">';
    echo '<input type="hidden" name="productPrice" value = "' . $results[$i]->getPrice() . '">';
    echo '<input type="hidden" name="productImage" value = "' . $results[$i]->getImage() . '">';
    echo '<input type="submit" value="Edit" style="width:150px;height:40px;">';
    echo '</form></td>';
    echo '<td><form action="../admin/DeleteProduct.php" method="post"><input type="hidden" name="id" value="' . $results[$i]->getId() . '">';
    echo '<input type="hidden" name="productName" value="' . $results[$i]->getName() . '"><input type="submit" value="Delete" style="width:150px;height:40px"></form></td>';
    echo "</tr>";
}

?>

</tbody>
</table>

<script>
$(document).ready( function () {
    $('#customers').DataTable();
} );
</script>