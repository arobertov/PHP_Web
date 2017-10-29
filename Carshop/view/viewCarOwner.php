<table>
	<thead>
		<tr>
			<th>Car Make</th>
			<th>Car Model</th>
			<th>Car Year</th>
			<th>Car ID</th>
			<th>Owner First Name</th>
			<th>Owner Last Name</th>
			<th>Customer Id</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $row): ?>
		<tr>
			<td><?php echo $row['make'] ?></td>
			<td><?php echo $row['model'] ?></td>
			<td><?php echo $row['year'] ?></td>
			<td><?php echo $row['car_id'] ?></td>
			<td><?php echo $row['first_name'] ?></td>
			<td><?php echo $row['last_name'] ?></td>
			<td><?php echo $row['customer_id'] ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

