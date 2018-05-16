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
    $item['title'] = $job->find('h4.media-heading', 0)->plaintext;
    $item['location'] = $job->find('p.location', 0)->plaintext;
    $item['date'] = $job->find('p.date', 0)->plaintext;
    $item['content'] = trim($job->find('article', 0)->plaintext);
    $item['apply_link'] = $job->find('p.text-center a', 0)->href;
    $jobs[] = $item;
}

    print '<pre>';
    var_dump($jobs);
    print '</pre>';