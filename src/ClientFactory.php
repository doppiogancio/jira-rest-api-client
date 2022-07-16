<?php

declare(strict_types=1);

namespace DoppioGancio\Jira;

use GuzzleHttp\Client as GuzzleClient;

class ClientFactory
{
    public static function create(string $baseUri, string $username, string $password): Client
    {
        return new Client(
            new GuzzleClient([
                'base_uri' => $baseUri,
                'auth' => [
                    $username,
                    $password,
                ],
            ])
        );
    }
}
