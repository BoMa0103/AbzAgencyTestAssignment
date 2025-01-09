<?php

namespace App\Livewire;

use App\Services\AbzAgencyApi\AbzAgencyApiService;
use App\Services\AbzAgencyApi\DTO\StoreUserDTO;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public int $position_id = 0;

    public $photo;

    public Collection $positions;

    protected function getAbzAgencyApiService(): AbzAgencyApiService
    {
        return app(AbzAgencyApiService::class);
    }

    protected array $validationRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',
        'position_id' => 'required|integer',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
    ];

    public function submit(): void
    {
        $this->validate($this->validationRules);

        $photoBase64 = base64_encode(file_get_contents($this->photo->getRealPath()));

        $storeUserDTO = StoreUserDTO::fromArray([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position_id' => $this->position_id,
            'photo' => $photoBase64,
        ]);

        $userId = $this->getAbzAgencyApiService()->createUser($storeUserDTO);

        $this->redirectRoute('users.index');
    }

    public function render()
    {
        $this->positions = $this->getAbzAgencyApiService()->getPositions();

        return view('livewire.create-user');
    }
}
