<?php


use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\DomCrawler\Crawler;
use Williamtome\BuscadorCursosAlura\Searcher;

class TestSearcherCourses extends TestCase
{
    private  $httpClientMock;
    private $url = 'url-teste';

    protected function setUp(): void
    {
        $html = <<<FIM
            <html>
            <body>
                <span class="card-curso__nome">Curso teste 1</span>
                <span class="card-curso__nome">Curso teste 2</span>
                <span class="card-curso__nome">Curso teste 3</span>
            </body>
            </html>
FIM;
        $stream = $this->createMock(StreamInterface::class);
        $stream->expects($this->once())
            ->method('__toString')
            ->willReturn($html);

        $response = $this->createMock(ResponseInterface::class);
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($stream);

        $httpClient = $this->createMock(ClientInterface::class);
        $httpClient->expects($this->once())
            ->method('request')
            ->with('GET', $this->url)
            ->willReturn($response);

        $this->httpClientMock = $httpClient;
    }

    public function testShouldBeReturnCourses()
    {
        $crawler = new Crawler();
        $searcher = new Searcher($this->httpClientMock, $crawler);

        $courses = $searcher->search($this->url);

        $this->assertCount(3, $courses);
        $this->assertEquals('Curso teste 1', $courses[0]);
        $this->assertEquals('Curso teste 2', $courses[1]);
        $this->assertEquals('Curso teste 3', $courses[2]);
    }
}
