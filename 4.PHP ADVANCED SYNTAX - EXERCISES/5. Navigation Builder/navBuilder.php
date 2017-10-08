<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 25.9.2017 г.
 * Time: 14:35
 */
function navBuilder($data){
	//split string by ', '
	$arr = explode(', ',$data);
	echo '<ul>';
	foreach ($arr as $value){
		echo "<li> $value </li>";
	}
	echo '</ul>';
}

if(isset($_GET['submit'])) {
	$categories = trim($_GET['category']);
	$tags = trim($_GET['tag']);
	$months = trim($_GET['month']);

	echo '<h2>Categories</h2>';
	navBuilder($categories);

	echo '<h2>Tags</h2>';
	navBuilder($tags);

	echo '<h2>Months</h2>';
	navBuilder($months);
}

