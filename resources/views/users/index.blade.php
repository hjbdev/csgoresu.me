<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="p-6 mb-6 bg-white shadow-sm sm:rounded-lg">
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                        const filterToggle = document.getElementById('filterToggle');
                      const filterForm = document.getElementById('filterForm');
                    let filtersOpen = false;
                        filterToggle.addEventListener('click', function (e) {
                            e.preventDefault();
                            filtersOpen = !filtersOpen;
                            filterToggle.innerText = filtersOpen ? 'Hide' : 'Show';
                            filterForm.classList.toggle('h-0');
                        });

                        if(window.location.search.includes('filter')) {
                            filtersOpen = !filtersOpen;
                            filterToggle.innerText = filtersOpen ? 'Hide' : 'Show';
                            filterForm.classList.toggle('h-0');
                        }
                    });
                    </script>
                    <div class="text-sm tracking-widest uppercase">
                        Filters
                        <a href="#" id="filterToggle" class="text-xs tracking-normal lowercase">Show</a>
                    </div>
                    <form action="" method="get" id="filterForm" class="h-0 overflow-hidden">
                        <div class="grid gap-6 mt-6 md:grid-cols-2">
                            @php
                            $roles = request()->filter['roles'] ?? [];
                            $region = request()->filter['region'] ?? null;
                            @endphp
                            <div>
                                <x-label for="roles" :value="__('Roles*')" />
                                <select multiple id="roles"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="filter[roles][]"
                                    :value="$roles">
                                    <option @if(in_array('In Game Leader', $roles)) selected @endif>In Game Leader</option>
                                    <option @if(in_array('Entry Fragger', $roles)) selected @endif>Entry Fragger</option>
                                    <option @if(in_array('Support', $roles)) selected @endif>Support</option>
                                    <option @if(in_array('AWPer', $roles)) selected @endif>AWPer</option>
                                    <option @if(in_array('Rifler', $roles)) selected @endif>Rifler</option>
                                    <option @if(in_array('Lurker', $roles)) selected @endif>Lurker</option>
                                </select>
                                <x-supporting-text>You can select multiple with Ctrl + Click</x-supporting-text>
                            </div>
                            {{-- <div>
                                <x-label for="region" :value="__('Region*')" />
                                <select id="region" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="filter[region]">
                                    <option value="" @if(!$region) selected @endif disabled>Select a region</option>
                                    <option value="eu" @if($region=='eu' ) selected @endif>Europe</option>
                                    <option value="na" @if($region=='na' ) selected @endif>North America</option>
                                    <option value="sa" @if($region=='sa' ) selected @endif>South America</option>
                                    <option value="oce" @if($region=='oce' ) selected @endif>Oceania</option>
                                    <option value="asia" @if($region=='asia' ) selected @endif>Asia</option>
                                    <option value="africa" @if($region=='africa' ) selected @endif>Africa</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="flex justify-end gap-6 mt-6">
                            <a href="/players"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                                Reset
                            </a>
                            <x-button>Update</x-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="max-w-7xl mx-auto bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="w-32 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Name
                                            </th>

                                            <th scope="col" class="w-16 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Age
                                            </th>
                                            <th scope="col" class="px-6 w-16 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                FACEIT
                                            </th>
                                            {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                ESEA Rank
                                            </th> --}}
                                            {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                MM Rank
                                            </th> --}}
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Role(s)
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Team Experience
                                            </th>
                                            {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Region
                                            </th> --}}
                                            <th scope="col" class="w-16 px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Country
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($users->items() as $user)
                                        <tr class="relative cursor-pointer">
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                                {{-- <div class="text-sm text-gray-500">
                                                    jane.cooper@example.com
                                                </div> --}}
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->age }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->faceit_rank }}
                                                </div>
                                            </td>
                                            {{-- <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->esea_rank }}
                                                </div>
                                            </td> --}}
                                            {{-- <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $mmRanks[$user->mm_rank ?: 0] }}
                                                </div>
                                            </td> --}}
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                @foreach ($user->roles as $role)
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">
                                                    {{ $role }}
                                                </span>
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-2 text-sm whitespace-nowrap">
                                                {{ Str::limit($user->team_experience, 100) }}
                                            </td>
                                            {{-- <td class="px-6 py-2 text-sm uppercase whitespace-nowrap">
                                                {{ $user->region }}
                                            </td> --}}
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <img src="/img/country-flags/{{ strtolower($user->country) }}.svg" class="w-8 mx-auto rounded-sm">
                                            </td>
                                            <td>
                                                <a href="/players/{{ $user->hashid }}" class="absolute inset-0"></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        @if($users->count() === 0)
                                        <tr class="relative cursor-pointer">
                                            <td class="px-6 py-4 whitespace-nowrap" colspan="8">
                                                <div class="text-sm font-medium text-center text-gray-900">
                                                    No Results Found
                                                </div>

                                            </td>
                                            @endif

                                    </tbody>
                                </table>
                                <nav class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6" aria-label="Pagination">
                                    <div class="hidden sm:block">
                                        <p class="text-sm text-gray-700">
                                            Showing
                                            <span class="font-medium">{{ $users->currentPage() * $users->perPage() - $users->perPage() +1 }}</span>
                                            to
                                            <span class="font-medium">{{ $users->currentPage() * $users->perPage() }}</span>
                                            of
                                            <span class="font-medium">{{ $users->total() }}</span>
                                            results
                                        </p>
                                    </div>
                                    <div class="flex justify-between flex-1 sm:justify-end">
                                        <a href="{{ $users->previousPageUrl() }}"
                                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            Previous
                                        </a>
                                        <a href="{{ $users->nextPageUrl() }}"
                                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            Next
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="p-6 mt-6 text-white rounded shadow-md bg-gradient-to-r from-blue-500 to-purple-600">
                <div class="text-2xl">Your ad could be here!</div>
                <a href="mailto:harry@stratbook.co" class="font-semibold">Get in touch</a>
            </div> --}}
        </div>
    </div>
</x-app-layout>
