<?php

namespace HTMLscrapper;

class Scrapper
{
    public static function scrapeData($html, $regex) {
        preg_match_all($regex, $html, $matches);
        return $matches;
    }

    public static function jobsToArray($html) {
        foreach ($html as $key => $value) {
            // preg_match();
        }
        return $jobs;
    }
}
