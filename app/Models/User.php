<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'password',
        'email',
        'role_id',
        'type',
        'gender',
        'mobile',
        'is_admin',
        'is_volunteer',
        'is_sponsor',
        'is_vendor',
        'is_account_completed',
        'bvn',
        'nin',
        'company_name',
        'company_rc',
        'company_address',
        'position',
        'bank',
        'account_name',
        'account_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function isAdmin(){
        return auth()->user()->is_admin;
    }

    public static function isVolunteer(){
        return auth()->user()->is_volunteer;
    }

    public static function isSponsor(){
        return auth()->user()->is_sponsor;
    }

    public static function isVendor(){
        return auth()->user()->is_vendor;
    }
}
