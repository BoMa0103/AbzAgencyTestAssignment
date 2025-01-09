<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 shadow rounded-lg">
                <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Email</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Phone</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Position</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Photo</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-4 text-sm text-gray-800 dark:text-gray-100">{{ $user['name'] }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $user['email'] }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $user['phone'] }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $user['position'] }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">
                            <img src="{{ $user['photo'] }}" alt="{{ $user['name'] }} photo" class="h-12 w-12 rounded-full">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Show More Button -->
        @if ($hasMorePages)
            <div class="flex justify-center mt-8">
                <button
                    wire:click="loadMore"
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                >
                    Show More
                </button>
            </div>
        @endif

        <!-- Error Message -->
        @if (session()->has('error'))
            <div class="mt-4 text-red-600 dark:text-red-400">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
