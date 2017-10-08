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
		<div>
			<input type="submit" name="calculate" value="Calculate"/>
		</div>
	</form>
	<ul>
<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 20:51
 */

if(isset($_GET['calculate'])):
$operation = $_GET['operation'];
$numberOne = $_GET['number_one'];
$numberTwo = $_GET['number_two'];

if ($operation == "sum") {
	$result = ($numberOne+$numberTwo);
  echo '<li style="color:red">'.$result.'</li>';
} else if ($operation == "subtract") {
	$result = ($numberOne - $numberTwo);
	echo '<li style="color:red">'.$result.'</li>';
} else {
	$result ="Wrong operation supplied";
	echo '<li style="color:red">'.$result.'</li>';
}
endif;

?>
	</ul>

</html>
