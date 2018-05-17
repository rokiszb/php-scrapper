PHP scrapper by Rokas Lakstauskas

libraries used:
"sunra/php-simple-html-dom-parser": "1.5",
"justinrainbow/json-schema": "5.2"

1. Clone git repository to your local drive.
2. Start server via php cli 'php -S localhost:8000'
3. To scrape data visit scrapper.php file or enter it via command line. Data gets scrapped to jobs.json file.
4. To validate jobs file with scrapped jobs data via command line, enter 'php validate.php jobs.json'.
5. To view data visit api.php