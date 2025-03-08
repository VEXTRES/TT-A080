<?php
namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use PhpParser\Node\Stmt\TryCatch;

class NewsApiService{
    private $http;
    private $url;
    private $token;

    public function __construct(){

            $this->http =new Client();
            $this->url = config('services.news_api.url');
            $this->token=config('services.news_api.token');

    }

    public function getNews(string $search=''){
        try {
            $response = $this->http->get($this->url. '/everything', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '. $this->token,
                ],
                'form_params' => [
                    'source.country.code' => 'mx',
                    'category.name' => 'Health',
                    'title' => $search,
                    'per_page' => 30,
                ],
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            // Filtrar duplicados por título
            if (isset($data['results']) && is_array($data['results'])) {
                $uniqueTitles = [];
                $uniqueResults = [];

                foreach ($data['results'] as $item) {
                    if (!in_array($item['title'], $uniqueTitles)) {
                        $uniqueTitles[] = $item['title'];
                        $uniqueResults[] = $item;
                    }
                }

                // Actualizar los resultados con noticias de títulos únicos
                $data['results'] = $uniqueResults;
            }

            return $data;
        } catch (Exception $e) {
            return ['code_error' => 401, 'messages' => ['token' => 'error al generar el token: ' . $e->getMessage()]];
        }
    }


}
