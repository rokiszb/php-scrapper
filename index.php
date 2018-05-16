<?php
require 'scrapper.php';
use HTMLscrapper\Scrapper;

$url = 'http://www.ibusmedia.com/career.htm';
$page = file_get_contents($url);
$regex = '/<div class="widget panel">(.*?)<\/div>/is';
$regexForJobsContainer = '/<div class="col-md-18 career panel-group">(.*?)<\/div>/is';
$jobTitleRegex = '/<h4 class="media-heading">(.*?)<\/h4>/is';
$jobLocationRegex = '/<p class="location">(.*?)<\/p>/is';
$jobDateRegex = '/<p class="date">(.*?)<\/p>/is';
$jobDateRegex = '/<p class="date">(.*?)<\/p>/is';
$jobDateRegex = '/<p class="date">(.*?)<\/p>/is';
$scrappedAllJobs = Scrapper::scrapeData($page, $regex);

// var_dump( $page);

print '<pre>';
var_dump(($scrappedAllJobs));
print '</pre>';
print_r($scrappedAllJobs);
foreach ($scrappedAllJobs[0] as $key => $value) {
    print '<pre>';
    var_dump(htmlspecialchars($value));
    print '</pre>';
}
