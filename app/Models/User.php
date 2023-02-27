<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasHashid, HashidRouting;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'faceit_url',
        'faceit_rank',
        'esea_url',
        'esea_rank',
        'esl_url',
        'esportal_url',
        'twitter_url',
        'about',
        'mm_rank',
        'team_experience',
        'roles',
        'country',
        'region',
        'show',
        'age'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'steam_id'
    ];

    protected $casts = [
        'roles' => 'array',
        'show' => 'boolean'
    ];
}
