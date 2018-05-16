<?php
require 'vendor/autoload.php';
use Sunra\PhpSimple\HtmlDomParser;

$url = 'http://www.ibusmedia.com/career.htm';
$page = file_get_contents($url);
$dom = HtmlDomParser::str_get_html( $page );

// $jobs = $dom->find('div[class=widget panel]');

// foreach ($jobs as $key => $job) {
//     print '<pre>';
//     var_dump($job->plaintext);
//     print '</pre>';
//     exit;
// }

foreach( $dom->find('div[class=widget panel]') as $job) {
    $item['heading'] = $job->find('h4.media-heading', 0)->plaintext;
    $item['location'] = $job->find('p.location', 0)->plaintext;
    $item['date'] = $job->find('p.date', 0)->plaintext;
    $jobs[] = $item;
}

    print '<pre>';
    var_dump($jobs);
    print '</pre>';