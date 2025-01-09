<div class="max-w-xl mx-auto">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input wire:model="name" id="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" />
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model="email" id="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-sm sm:text-base font-medium text-gray-700">Phone</label>
            <input wire:model="phone" id="phone" type="tel" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" />
            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Position -->
        <div class="mb-4">
            <label for="position_id" class="block text-sm font-medium text-gray-700">Position</label>
            <select wire:model="position_id" id="position_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                <option value="">Select Position</option>
                @foreach($positions as $position)
                    <option value="{{ $position['id'] }}">{{ $position['name'] }}</option>
                @endforeach
            </select>
            @error('position_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Photo -->
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input wire:model="photo" id="profile_picture" type="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" />
            @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

            @if ($photo)
                <div class="mt-2">
                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="h-20 w-20 rounded-full object-cover">
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center mt-4">
            <!-- Back Button -->
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                <- Users List
            </a>

            <!-- Create User Button -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Create User
            </button>
        </div>
    </form>
</div>
