<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="relative p-6 mt-12">
                    @if(auth()->check() && $user->id === auth()->user()->id)
                    <div class="absolute top-0 right-0 mt-6 mr-6">
                        <a href="/profile/edit" class="font-semibold text-gray-400 underline">Edit</a>
                    </div>
                    @endif
                    <div class="space-y-6">
                        <div class="flex">
                            <div class="flex items-center w-24 h-24 -mt-20 bg-blue-500 border-2 border-white rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="grid gap-6 md:grid-cols-3">
                            <div class="md:col-span-2">
                                <h1 class="mb-2 text-4xl">{{ $user->name }}</h1>
                                <div class="flex flex-wrap space-x-2">
                                    @foreach($user->roles ?? [] as $role)
                                    <div class="px-1 py-0.5 text-sm font-semibold tracking-widest text-gray-800 uppercase bg-gray-100 rounded ">{{ $role }}</div>
                                    @endforeach
                                </div>

                                @if($user->team_experience)
                                <h2 class="mt-6 mb-2 text-xl font-semibold">Team Experience</h2>
                                <div>{!! nl2br(htmlspecialchars($user->team_experience)) !!}</div>
                                @endif

                                @if($user->about)
                                <h2 class="mt-6 mb-2 text-xl font-semibold">About</h2>
                                <div>{!! nl2br(htmlspecialchars($user->about)) !!}</div>
                                @endif
                            </div>
                            <div>
                                <h3 class="mb-3 text-sm tracking-widest uppercase">Links</h3>
                                <ul>
                                    <li>
                                        <a class="font-semibold text-gray-600" href="https://steamcommunity.com/profiles/{{ $user->steam_id }}" target="_blank">Steam</a>
                                    </li>
                                    @if($user->faceit_url)
                                    <li>
                                        <a class="font-semibold text-gray-600" href="{{ $user->faceit_url }}" target="_blank">FaceIT</a>
                                    </li>
                                    @endif
                                    @if($user->esea_url)
                                    <li>
                                        <a class="font-semibold text-gray-600" href="{{ $user->esea_url }}" target="_blank">ESEA</a>
                                    </li>
                                    @endif
                                    @if($user->esl_url)
                                    <li>
                                        <a class="font-semibold text-gray-600" href="{{ $user->esl_url }}" target="_blank">ESL</a>
                                    </li>
                                    @endif
                                    @if($user->esportal_url)
                                    <li>
                                        <a class="font-semibold text-gray-600" href="{{ $user->esportal_url }}" target="_blank">Esportal</a>
                                    </li>
                                    @endif
                                    @if($user->twitter_url)
                                    <li>
                                        <a class="font-semibold text-gray-600" href="{{ $user->twitter_url }}" target="_blank">Twitter</a>
                                    </li>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>