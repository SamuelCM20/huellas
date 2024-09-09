<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'number_id',
        'name',
        'last_name',
        'phone',
        'address',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
    
    public function getFullNameAttribute(){
        return "{$this->name} {$this->last_name}";
    }


    //crear un mutador
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setRememberTokenAttribute()
    {

        $this->attributes['remember_token'] = Str::random(10) ;
    }
    //Relaciones
    public function publication()
    {
        return $this->hasMany(Publication::class, 'user_id', 'id');
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
