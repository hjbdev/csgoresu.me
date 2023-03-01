<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            // Gravatar::make()->maxWidth(50),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Steam Id')
                ->rules('required', 'max:255'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            Text::make('Country')
                ->rules('string', 'max:4', 'nullable'),

            URL::make('Faceit Url')
                ->rules('nullable', 'url', 'max:255', 'starts_with:https://faceit.com/,https://www.faceit.com/'),

            Number::make('Faceit Rank')
                ->rules('nullable', 'numeric', 'max:10', 'min:0'),

            URL::make('Esea Url')
                ->rules('nullable', 'url', 'max:255', 'starts_with:https://play.esea.net/users/'),

            Text::make('Esea Rank')
                ->rules('nullable', 'string', 'max:2'),

            URL::make('Esl Url')
                ->rules('nullable', 'url', 'max:255', 'starts_with:https://play.eslgaming.com/player/'),

            URL::make('Esportal Url')
                ->rules('nullable', 'url', 'max:255', 'starts_with:https://esportal.com/'),

            URL::make('Twitter Url')
                ->rules('nullable', 'url', 'max:255', 'starts_with:https://twitter.com/'),

            Number::make('Age')
                ->rules('nullable', 'numeric', 'max:60', 'min:5'),

            Textarea::make('Team Experience')
                ->rules('nullable', 'string', 'max:3000'),

            Textarea::make('About')
                ->rules('nullable', 'string', 'max:3000'),

            MultiSelect::make('Roles')
                ->options([
                    'In Game Leader','Rifler','Support','Lurker','Entry Fragger','AWPer'
                ])
                ->rules('required'),
            
            Boolean::make('Show')->help('Determines whether the user wants to be shown or not')

            
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
