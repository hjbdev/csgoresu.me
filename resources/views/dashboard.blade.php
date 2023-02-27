<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3">
                <div class="md:col-span-2">
                    <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                            UKCS Teamfinder
                        </h2>
                        <p class="mt-4 text-lg text-gray-500">
                            Here you can create a comprehensive profile to send to potential teams, demonstrating your abilities and experience as a player.
                        </p>
                        <div class="flex justify-end mt-6 space-x-2">
                            <a href="{{ url('/players/' . auth()->user()->hashid) }}" class="inline-flex px-4 py-2 text-base font-medium text-gray-900 bg-white border border-transparent rounded-md shadow-sm hover:bg-gray-100">
                                View Profile
                            </a>
                            <a href="/profile/edit" class="inline-flex px-4 py-2 text-base font-medium text-white bg-purple-600 border border-transparent rounded-md shadow-sm hover:bg-purple-700">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>