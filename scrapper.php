<?php
require 'vendor/autoload.php';
use Sunra\PhpSimple\HtmlDomParser;

$url = 'http://www.ibusmedia.com/career.htm';
$page = file_get_contents($url);
$dom = HtmlDomParser::str_get_html( $page );

foreach( $dom->find('div[class=widget panel]') as $job) {
    $item['title'] = $job->find('h4.media-heading', 0)->plaintext;
    $item['location'] = $job->find('p.location', 0)->plaintext;
    $item['date'] = $job->find('p.date', 0)->plaintext;
    $item['content'] = trim(preg_replace('/Apply For This Position/', '', $job->find('article', 0)->plaintext));
    $item['apply_link'] = $job->find('p.text-center a', 0)->href;
    $jobs[] = $item;
}

$jsonJobs = json_encode($jobs,  JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
file_put_contents('jobs.json', $jsonJobs);
// $jsondata = file_get_contents('jobs.json');
// $jsonDecoded = json_decode($jsondata);
print '<pre>';
var_dump($jsonJobs);
print '</pre>';