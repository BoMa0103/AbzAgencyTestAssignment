<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">List of Users</h1>

            <!-- Add New User Button -->
            <a
                href="{{ route('users.create') }}"
                class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
            >
                Add New User
            </a>
        </div>

        <!-- User List Component -->
        <livewire:user-list />
    </div>
</x-guest-layout>
