<?php

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Williamtome\BuscadorCursosAlura\Searcher;

$client = new Client(['base_uri' => 'https://www.alura.com.br']);
$crawler = new Crawler();
$searcher = new Searcher($client, $crawler);

$cursos = $searcher->search('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
