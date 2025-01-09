<?php
/**
 * Description of StoreUserDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\AbzAgencyApi\DTO;

readonly class StoreUserDTO
{
    public function __construct(
        private string $name,
        private string $email,
        private string $phone,
        private int $position_id,
        private string $photo,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            phone: $data['phone'],
            position_id: $data['position_id'],
            photo: $data['photo'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position_id' => $this->position_id,
            'photo' => $this->photo,
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPositionId(): int
    {
        return $this->position_id;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }
}
