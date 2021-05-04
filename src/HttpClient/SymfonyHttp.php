<?php


namespace App\HttpClient;

use Symfony\Component\Console\Command\Command;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;

class SymfonyHttp extends Command
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchGitHubInformation(): array
    {
        try {
            $response = $this->client->request(
                'GET',
                'https://api.coinpaprika.com/v1/'
            );
        } catch (TransportExceptionInterface) {
        }

        try {
            $statusCode = $response->getStatusCode();
        } catch (TransportExceptionInterface) {
        }
        // $statusCode = 200
        try {
            $contentType = $response->getHeaders()['content-type'][0];
        } catch (ClientExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface | TransportExceptionInterface) {
        }
        // $contentType = 'application/json'
        try {
            $content = $response->getContent();
        } catch (ClientExceptionInterface | ServerExceptionInterface | RedirectionExceptionInterface | TransportExceptionInterface) {
        }
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        try {
            $content = $response->toArray();
        } catch (ClientExceptionInterface | DecodingExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface | TransportExceptionInterface) {
        }
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}