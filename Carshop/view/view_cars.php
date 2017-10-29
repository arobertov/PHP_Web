<table>
	<thead>
		<tr>
			<th>Car Brand</th>
			<th>Car Model</th>
			<th>Car Year</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($result as $row): ?>
	    	<tr>
			    <td><?php echo $row['make'] ?></td>
			    <td><?php echo $row['model'] ?></td>
			    <td><?php echo $row['year'] ?></td>
		    </tr>
		<?php endforeach; ?>
	</tbody>
</table>