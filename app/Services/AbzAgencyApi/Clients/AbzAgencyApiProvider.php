<?php
/**
 * Description of AbzAgencyProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\AbzAgencyApi\Clients;

use App\Services\AbzAgencyApi\DTO\SearchUsersDTO;
use App\Services\AbzAgencyApi\DTO\StoreUserDTO;
use App\Services\Http\HttpClient;
use Illuminate\Support\Collection;

class AbzAgencyApiProvider extends HttpClient
{
    const string CREATE_USER_URL_TEMPLATE = '/api/v1/users';

    const string GET_USERS_URL_TEMPLATE = '/api/v1/users';

    const string FIND_USER_URL_TEMPLATE = '/api/v1/users/{id}';

    const string GET_POSITIONS_URL_TEMPLATE = '/api/v1/positions';

    const string GET_TOKEN_URL_TEMPLATE = '/api/v1/token';

    protected function getServiceHost(): string
    {
        return (string) config('services.abz-agency.host');
    }

    public function getParams(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => true,
        ];
    }

    public function createUser(StoreUserDTO $dto): ?int
    {
        $response = $this->post($this->generateCreateUserUrl(), $dto->toArray(), $this->getParams());

        return $response['user_id'] ?? null;
    }

    public function getUsers(SearchUsersDTO $dto): Collection
    {
        $url = $this->generateGetUsersUrl();
        $url .= '?'.http_build_query([
                'page' => $dto->getPage(),
                'count' => $dto->getCount(),
            ]);

        $response = $this->get($url, $this->getParams());

        return collect($response['users'] ?? []) ?: collect();
    }

    public function findUser(int $userId): array
    {
        return $this->get($this->generateFindUserUrl($userId), $this->getParams()) ?: [];
    }

    public function getPositions(): Collection
    {
        $response = $this->get($this->generateGetPositionsUrl(), $this->getParams()) ?: [];

        return collect($response['positions'] ?? []) ?: collect();
    }

    public function getToken(): string
    {
        return $this->get($this->generateGetTokenUrl(), $this->getParams()) ?: '';
    }

    private function generateCreateUserUrl(): string
    {
        return $this->getServiceHost() . self::CREATE_USER_URL_TEMPLATE;
    }

    private function generateGetUsersUrl(): string
    {
        return $this->getServiceHost() . self::GET_USERS_URL_TEMPLATE;
    }

    private function generateFindUserUrl(int $userId): string
    {
        return $this->getServiceHost() . sprintf(self::FIND_USER_URL_TEMPLATE, $userId);
    }

    private function generateGetPositionsUrl(): string
    {
        return $this->getServiceHost() . self::GET_POSITIONS_URL_TEMPLATE;
    }

    private function generateGetTokenUrl(): string
    {
        return $this->getServiceHost() . self::GET_TOKEN_URL_TEMPLATE;
    }
}
