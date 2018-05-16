<?php

require 'vendor/autoload.php';
use JsonSchema\Validator;
isset($argv[1]) ? '' : $argv[1] = 'jobs.json';
var_dump($argv[1]);
$data = json_decode(file_get_contents($argv[1]));

// Validate
$validator = new JsonSchema\Validator;

foreach ($data as $key => $value) {
    $validator->validate($value, (object)['$ref' => 'file://' . realpath('schema.json')]);

    if ($validator->isValid()) {
        echo "{$value->title} validates against the schema.<br>\n";
    } else {
        echo "JSON does not validate. Violations:\n";
        foreach ($validator->getErrors() as $error) {
            echo sprintf("[%s] %s\n", $error['property'], $error['message']);
        }
    }
}

if ($validator->isValid()) {
    echo "The supplied JSON validates against the schema.\n";
} else {
    echo "JSON does not validate. Violations:\n";
    foreach ($validator->getErrors() as $error) {
        echo sprintf("[%s] %s\n", $error['property'], $error['message']);
    }
}