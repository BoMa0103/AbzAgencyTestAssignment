<?php
/**
 * Description of AbzAgencyProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\AbzAgency\Clients;

use App\Services\Http\HttpClient;

class AbzAgencyProvider extends HttpClient
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

    public function createUser(array $data): int
    {
        return $this->post($this->generateCreateUserUrl(), $data, $this->getParams()) ?: 0;
    }

    public function getUsers(): array
    {
        return $this->get($this->generateGetUsersUrl(), $this->getParams()) ?: [];
    }

    public function findUser(int $userId): array
    {
        return $this->get($this->generateFindUserUrl($userId), $this->getParams()) ?: [];
    }

    public function getPositions(): array
    {
        return $this->get($this->generateGetPositionsUrl(), $this->getParams()) ?: [];
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
