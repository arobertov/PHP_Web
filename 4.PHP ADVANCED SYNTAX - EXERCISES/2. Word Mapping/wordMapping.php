<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 19:13
 */
include 'frontend.php';
if(isset($_GET['submit'])){
 $input = trim(strtolower($_GET['input']));
 $arr = str_word_count($input,1);
 $wordsCounter = [];
 $counter = 0;
	foreach ($arr as $value){
		for($i=0;$i<count($arr);$i++){
			if($arr[$i]==$value) {
				$counter ++;
			}
	    }
	    $wordsCounter[$value]=$counter;
		$counter = 0;
	}
 ?>
<!------------ render template start ------------------>

<table>
	<?php foreach ($wordsCounter as $key=>$value): ?>
	<tr>
		<td><?= $key; ?></td>
		<td><?= $value; ?></td>
	</tr>
<?php endforeach; ?>
</table>

<!------------ render template end -------------------->
	<?php
 }

  ?>
