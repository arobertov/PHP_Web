<?php foreach ($result as $row): ?>
<form method="post">
	<fieldset>
		<div>
			Customer First Name:
			<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"/>
		</div>
		<div>
			Customer Last Name:
			<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"/>
		</div>
		<div>
			Car Brand:
			<input type="text" name="make" value="<?php echo $row['make']; ?>"/>
		</div>
		<div>
			Car Model:
			<input type="text" name="model" value="<?php echo $row['model']; ?>"/>
		</div>
		<div>
			Car Year:
			<input type="text" name="year" value="<?php echo $row['year']; ?>"/>
		</div>
		<div>
			Sale Amount:
			<input type="text" name="amount" value="<?php echo $row['amount']; ?>"/>
		</div>
	</fieldset>
	<div>
		<input type="submit" value="Submit"/>
	</div>
</form>
<?php endforeach; ?>
