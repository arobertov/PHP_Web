<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Students Info</title>
</head>
<body>
	<form method="get">
		<div>
			Delimiter:
			<select name="delimiter">
				<option value=",">,</option>
				<option value="|">|</option>
				<option value="&">&</option>
			</select>
		</div>
		<div>
			Names:
			<input type="text" name="names"/>
		</div>
		<div>
			Ages:
			<input type="text" name="ages"/>
		</div>
		<div>
			<input type="submit" name="filter" value="Filter"/>
		</div>
	</form>

<?php if(isset($names,$ages)): ?>
	<table border="1" cellpadding="0" >
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0;$i<count($names);$i++): ?>
				<tr>
					<td><?= $names[$i]; ?></td>
					<td><?= $ages[$i]; ?></td>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>
<?php endif; ?>
</body>
</html>