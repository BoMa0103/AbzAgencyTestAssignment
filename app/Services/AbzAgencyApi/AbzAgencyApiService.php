<?php
/**
 * Description of AbzAgencyService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\AbzAgencyApi;

use App\Services\AbzAgencyApi\Clients\AbzAgencyApiProvider;
use App\Services\AbzAgencyApi\DTO\SearchUsersDTO;
use App\Services\AbzAgencyApi\DTO\StoreUserDTO;
use Illuminate\Support\Collection;

class AbzAgencyApiService
{
    public function __construct(
        private readonly AbzAgencyApiProvider $abzAgencyProvider,
    ) {
    }

    public function createUser(StoreUserDTO $dto): ?int
    {
        return $this->abzAgencyProvider->createUser($dto);
    }

    public function getUsers(SearchUsersDTO $dto): Collection
    {
        return $this->abzAgencyProvider->getUsers($dto);
    }

    public function findUser(int $userId): array
    {
        return $this->abzAgencyProvider->findUser($userId);
    }

    public function getPositions(): Collection
    {
        return $this->abzAgencyProvider->getPositions();
    }

    public function getToken(): string
    {
        return $this->abzAgencyProvider->getToken();
    }
}
