<?php
$lines = file('phrases.txt');
$number = rand(0, count($lines)-1);
$slogan = ($lines[$number]);
//echo $slogan;

?>