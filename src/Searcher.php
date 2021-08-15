<?php

namespace Williamtome\BuscadorCursosAlura;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Searcher
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function search(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);

        $html = $response->getBody();

        $this->crawler->addContent($html);

        $elementsCourses = $this->crawler->filter('span.card-curso__nome');
        $courses = [];

        foreach ($elementsCourses as $course) {
            $courses[] = $course->textContent;
        }

        return $courses;
    }
}