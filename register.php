<?php

$fh = fopen('register.txt', 'a+');
$date  = new DateTime();

fputs($fh,$date->format('d/m/y h:i:s') .' - '. json_encode($_POST) ."\n");
fclose($fh);