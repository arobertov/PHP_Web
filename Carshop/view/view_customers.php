<?php if(isset($_GET['alert'])){echo "<p class='alert'>{$_GET['alert']}</p>"; } ?>
<table>
	<thead>
		<tr>
			<th>Sale Date</th>
			<th>Sale Amount</th>
			<th>Car Brand</th>
			<th>Car Model</th>
			<th>Car Year</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($result as $i=>$row): ?>
		<tr>
			<td><?php echo $row['date_of_deal'] ?></td>
			<td><?php echo $row['amount'] ?></td>
			<td><?php echo $row['make'] ?></td>
			<td><?php echo $row['model'] ?></td>
			<td><?php echo $row['year'] ?></td>
			<td><a href="?input=edit&id=<?php echo $row['id'] ?>"><?php echo $row['first_name'].' '. $row['last_name'] ?></a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
