<?php

namespace App\Livewire;

use App\Services\AbzAgencyApi\AbzAgencyApiService;
use App\Services\AbzAgencyApi\DTO\SearchUsersDTO;
use Illuminate\Support\Collection;
use Livewire\Component;

class UserList extends Component
{
    public Collection $users;
    public int $currentPage = 1;
    public bool $hasMorePages = true;

    public const int DEFAULT_COUNT = 6;

    protected function getAbzAgencyApiService(): AbzAgencyApiService
    {
        return app(AbzAgencyApiService::class);
    }

    public function loadMore(): void
    {
        $this->users = $this->getAbzAgencyApiService()->getUsers(SearchUsersDTO::fromArray([
            'page' => $this->currentPage,
            'count' => self::DEFAULT_COUNT,
        ]));

        $this->currentPage++;
    }

    public function render()
    {
        $this->users = $this->getAbzAgencyApiService()->getUsers(SearchUsersDTO::fromArray([
            'page' => $this->currentPage,
            'count' => self::DEFAULT_COUNT,
        ]));

        return view('livewire.user-list');
    }
}
