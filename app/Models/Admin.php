<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The guard for this authenticatable model
     */
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'name',
        'username', 
        'email',
        'password',
        'role',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if admin has a specific role
     */
    public function hasRole($roles): bool
    {
        if (is_array($roles)) {
            return in_array($this->role, $roles);
        }
        
        return $this->role === $roles;
    }
}