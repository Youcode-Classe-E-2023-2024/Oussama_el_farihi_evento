<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Edit Role</h2>
                    <a href="{{ route('admin.categories.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h2a2 2 0 012 2v6a2 2 0 002 2h6a2 2 0 002-2v-6a2 2 0 012-2h2M3 10v4m0-4l7-7m1 1h4m-5 0v4m-6 6v2m0 4v2m0-6h12a2 2 0 002-2v-6a2 2 0 00-2-2H3a2 2 0 00-2 2v6a2 2 0 002 2zm0 0v2m0 4v2" />
                        </svg>
                        Index Categories
                    </a>
                </div>
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
    @csrf
    @method('PATCH')
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category Name:</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ old('name', $category->name) }}">
    </div>
    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition ease-in-out duration-300">
        Update Category
    </button>
</form>
            </div>
        </div>
    </div>
</x-admin-layout>
