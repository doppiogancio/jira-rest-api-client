<?php

declare(strict_types=1);

namespace DoppioGancio\Jira;

use GuzzleHttp\Client as HttpClient;

class ApiClientFactory
{
    public static function create(string $baseUri, string $username, string $password): ApiClient
    {
        return new ApiClient(
            new HttpClient([
                'base_uri' => $baseUri,
                'auth' => [
                    $username,
                    $password,
                ],
            ])
        );
    }
}
