<x-organizer-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Créer un nouvel événement</h2>
                </div>
                <form action="{{ route('organizer.events.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Titre de l'événement:</label>
                        <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="title" name="title" required>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description:</label>
                        <textarea class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date:</label>
                        <input type="date" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="date" name="date" required>
                    </div>
                    <div>
    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Lieu:</label>
    <select id="location" name="location" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
        <option value="Casablanca">Casablanca</option>
        <option value="Rabat">Rabat</option>
        <option value="Fes">Fes</option>
        <option value="Marrakech">Marrakech</option>
        <option value="Tangier">Tangier</option>
        <option value="Agadir">Agadir</option>
        <option value="Essaouira">Essaouira</option>
    </select>
</div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Catégorie:</label>
                        <select class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="category" name="category_id">
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="available_spots" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre de places disponibles:</label>
                        <input type="number" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="available_spots" name="available_spots" required>
                    </div>
                    <div>
                        <label for="bookings_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Booking Acceptance:</label>
                        <select id="bookings_type" name="bookings_type" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm leading-tight text-gray-700 focus:outline-none focus:shadow-outline-blue">
                            <option value="0">Manual Validation</option>
                            <option value="1">Automatic Acceptance</option>
                        </select>
                    </div>
                    <div>
                        <label for="event_image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Image de l'événement:</label>
                        <input type="file" class="mt-1 block w-full px-3 py-2 file:bg-white file:border file:border-gray-300 file:rounded-md file:text-sm file:font-semibold file:px-4 file:py-2 file:text-gray-700 file:shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition ease-in-out duration-300">Créer l'événement</button>
                </form>
            </div>
        </div>
    </div>
</x-organizer-layout>
