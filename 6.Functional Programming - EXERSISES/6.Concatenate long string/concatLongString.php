<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 11:04
 */
$above = 20;
$input = [
	'Hello ',
	'there.',
	'This is just another long string',
	'that would pass the check.',
	' but',
	' this',
	' will',
	' not',
	'pass it.'
];
echo filter($input, $above, function ($str) use ($above) {
	return strlen($str) > $above ? true : false;
});
function filter(array $input, int $above, callable $concatLongStr, string $output = ""): string {
	foreach ($input as $value) {
		$output .= ($concatLongStr($value) === true) ? $value : '';
	}
	return $output;
};