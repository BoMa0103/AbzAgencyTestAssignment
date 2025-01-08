<?php
/**
 * Description of AbzAgencyService.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\AbzAgency;

use App\Services\AbzAgency\Clients\AbzAgencyProvider;

class AbzAgencyService
{
    public function __construct(
        private readonly AbzAgencyProvider $abzAgencyProvider,
    ) {
    }

    public function createUser(array $data): int
    {
        return $this->abzAgencyProvider->createUser($data);
    }

    public function getUsers(): array
    {
        return $this->abzAgencyProvider->getUsers();
    }

    public function findUser(int $userId): array
    {
        return $this->abzAgencyProvider->findUser($userId);
    }

    public function getPositions(): array
    {
        return $this->abzAgencyProvider->getPositions();
    }
}
