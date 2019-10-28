<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hotel_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || redirect()->route('home');
        }
        return $this->hasRole($roles) || redirect()->route('home');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('nama', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('nama', $role)->first();
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
