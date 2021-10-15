<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="relative p-6">

                    <form class="space-y-6" action="/profile/edit" method="post">
                        <h1 class="text-4xl">{{ $user->name }}</h1>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div>
                            <x-label for="name" :value="__('Username*')" />
                            <x-input required id="name" class="block w-full mt-1" type="text" name="name" :value="old('name') ?: $user->name" required autofocus />
                        </div>
                        <div>
                            <x-label for="roles" :value="__('Roles*')" />
                            <select required multiple id="roles" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="roles[]" :value="old('roles') ?: $user->roles">
                                <option @if(in_array('In Game Leader', old('roles') ?: $user->roles ?: [])) selected @endif>In Game Leader</option>
                                <option @if(in_array('Entry Fragger', old('roles') ?: $user->roles ?: [])) selected @endif>Entry Fragger</option>
                                <option @if(in_array('Support', old('roles') ?: $user->roles ?: [])) selected @endif>Support</option>
                                <option @if(in_array('AWPer', old('roles') ?: $user->roles ?: [])) selected @endif>AWPer</option>
                                <option @if(in_array('Rifler', old('roles') ?: $user->roles ?: [])) selected @endif>Rifler</option>
                                <option @if(in_array('Lurker', old('roles') ?: $user->roles ?: [])) selected @endif>Lurker</option>
                            </select>
                            <x-supporting-text>You can select multiple with Ctrl + Click</x-supporting-text>
                        </div>
                        <div>
                            <x-label for="region" :value="__('Region*')" />
                            <select id="region" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="region" :value="old('region') ?: $user->region">
                                <option value="" @if(!(old('region') || $user->region)) selected @endif disabled>Select a region</option>
                                <option value="eu" @if((old('region') ?: $user->region) == 'eu') selected @endif>Europe</option>
                                <option value="na" @if((old('region') ?: $user->region) == 'na') selected @endif>North America</option>
                                <option value="sa" @if((old('region') ?: $user->region) == 'sa') selected @endif>South America</option>
                                <option value="oce" @if((old('region') ?: $user->region) == 'oce') selected @endif>Oceania</option>
                                <option value="asia" @if((old('region') ?: $user->region) == 'asia') selected @endif>Asia</option>
                                <option value="africa" @if((old('region') ?: $user->region) == 'africa') selected @endif>Africa</option>
                            </select>
                        </div>
                        <div>
                            <x-label for="country" :value="__('Country*')" />
                            <select id="country" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="country" :value="old('country') ?: $user->country">
                                <option value="" @if(!(old('country') || $user->country)) selected @endif disabled>Select a country</option>
                                @foreach($countries as $iso => $country)
                                <option value="{{ $iso }}" @if((old('country') ?: $user->country) == $iso) selected @endif>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="mm_rank" :value="__('Matchmaking Rank')" />
                            <select id="mm_rank" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="url" name="mm_rank" :value="old('mm_rank') ?: $user->mm_rank">
                                <option value="0" @if(!(old('mm_rank') || $user->mm_rank)) selected @endif disabled>Select a rank</option>
                                <option value="1" @if((old('mm_rank') ?: $user->mm_rank) == 1) selected @endif>Silver 1</option>
                                <option value="2" @if((old('mm_rank') ?: $user->mm_rank) == 2) selected @endif>Silver 2</option>
                                <option value="3" @if((old('mm_rank') ?: $user->mm_rank) == 3) selected @endif>Silver 3</option>
                                <option value="4" @if((old('mm_rank') ?: $user->mm_rank) == 4) selected @endif>Silver 4</option>
                                <option value="5" @if((old('mm_rank') ?: $user->mm_rank) == 5) selected @endif>Silver Elite</option>
                                <option value="6" @if((old('mm_rank') ?: $user->mm_rank) == 6) selected @endif>Silver Elite Master</option>
                                <option value="7" @if((old('mm_rank') ?: $user->mm_rank) == 7) selected @endif>Gold Nova 1</option>
                                <option value="8" @if((old('mm_rank') ?: $user->mm_rank) == 8) selected @endif>Gold Nova 2</option>
                                <option value="9" @if((old('mm_rank') ?: $user->mm_rank) == 9) selected @endif>Gold Nova 3</option>
                                <option value="10" @if((old('mm_rank') ?: $user->mm_rank) == 10) selected @endif>Gold Nova Master</option>
                                <option value="11" @if((old('mm_rank') ?: $user->mm_rank) == 11) selected @endif>Master Guardian 1</option>
                                <option value="12" @if((old('mm_rank') ?: $user->mm_rank) == 12) selected @endif>Master Guardian 2</option>
                                <option value="13" @if((old('mm_rank') ?: $user->mm_rank) == 13) selected @endif>Master Guardian Elite</option>
                                <option value="14" @if((old('mm_rank') ?: $user->mm_rank) == 14) selected @endif>Distinguished Master Guardian</option>
                                <option value="15" @if((old('mm_rank') ?: $user->mm_rank) == 15) selected @endif>Legendary Eagle</option>
                                <option value="16" @if((old('mm_rank') ?: $user->mm_rank) == 16) selected @endif>Legendary Eagle Master</option>
                                <option value="17" @if((old('mm_rank') ?: $user->mm_rank) == 17) selected @endif>Supreme Master First Class</option>
                                <option value="18" @if((old('mm_rank') ?: $user->mm_rank) == 18) selected @endif>The Global Elite</option>
                            </select>
                        </div>
                        <div>
                            <x-label for="faceit_url" :value="__('FaceIT Link')" />
                            <x-input id="faceit_url" class="block w-full mt-1" type="url" name="faceit_url" :value="old('faceit_url') ?: $user->faceit_url" />
                        </div>
                        <div>
                            <x-label for="faceit_rank" :value="__('FaceIT Rank')" />
                            <x-input id="faceit_rank" class="block w-full mt-1" type="number" max="10" name="faceit_rank" :value="old('faceit_rank') ?: $user->faceit_rank" />
                        </div>
                        <div>
                            <x-label for="esea_url" :value="__('ESEA Link')" />
                            <x-input id="esea_url" class="block w-full mt-1" type="url" name="esea_url" :value="old('esea_url') ?: $user->esea_url" />
                        </div>
                        <div>
                            <x-label for="esea_rank" :value="__('ESEA Rank')" />
                            <x-input id="esea_rank" class="block w-full mt-1" type="text" name="esea_rank" :value="old('esea_rank') ?: $user->esea_rank" />
                        </div>
                        <div>
                            <x-label for="esl_url" :value="__('ESL Link')" />
                            <x-input id="esl_url" class="block w-full mt-1" type="url" name="esl_url" :value="old('esl_url') ?: $user->esl_url" />
                        </div>
                        <div>
                            <x-label for="esportal_url" :value="__('Esportal Link')" />
                            <x-input id="esportal_url" class="block w-full mt-1" type="url" name="esportal_url" :value="old('esportal_url') ?: $user->esportal_url" />
                        </div>
                        <div>
                            <x-label for="twitter_url" :value="__('Twitter Link')" />
                            <x-input id="twitter_url" class="block w-full mt-1" type="url" name="twitter_url" :value="old('twitter_url') ?: $user->twitter_url" />
                        </div>
                        <div>
                            <x-label for="team_experience" :value="__('Previous Team Experience')" />
                            <x-textarea id="team_experience" class="block w-full mt-1" type="text" name="team_experience" :value="old('team_experience') ?: $user->team_experience" />
                            <x-supporting-text>Describe your previous team experience, leagues played, achievements, placements etc.</x-supporting-text>
                        </div>
                        <div>
                            <x-label for="about*" :value="__('About')" />
                            <x-textarea id="about" class="block w-full mt-1" type="text" name="about" :value="old('about') ?: $user->about" />
                            <x-supporting-text>Explain yourself as a player, give some background information.</x-supporting-text>
                        </div>
                        @csrf
                        <div class="flex justify-end">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>