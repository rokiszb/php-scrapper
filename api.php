<?php

$jsondata = file_get_contents('jobs.json');
$jsonDecoded = json_decode($jsondata);
print '<pre>';
var_dump($jsonDecoded);
print '</pre>';