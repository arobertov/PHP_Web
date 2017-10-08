<html>
	<form method="get">
		<div>
			<select name="operation">
				<option value="sum">Sum</option>
				<option value="subtract">Subtract</option>
			</select>
		</div>
		<div>
			<label>Number 1:</label><br/>
			<input type="text" name="number_one"/>
		</div>
		<div>
			<label>Number 2:</label><br/>
			<input type="text" name="number_two"/>
		</div>
		<?php if(isset($output)): ?>
			<div>
				Result: <br/>
				<input type="text" disabled="disabled" readonly="readonly" value="<?= $output; ?>"/>
			</div>
		<?php endif; ?>
		<div>
			<input type="submit" name="calculate" value="Calculate"/>
		</div>
	</form>
</html>