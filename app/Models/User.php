<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'alamat',
        'email',
        'jabatan',
        'password',
        'role'
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

    public static function totalAgen()
    {
        return self::where('role', 1)->count();
    }

    public function isCustomerService()
    {
        return $this->role == Role::CUSTOMER_SERVICE->value;
    }

    public function isVerificatorOrSigner()
    {
        return $this->role == Role::VERIFICATOR->value || $this->role == Role::SIGNER->value;
    }

    public function isVerificator()
    {
        return $this->role == Role::VERIFICATOR->value;
    }

    public function isSigner()
    {
        return $this->role == Role::SIGNER->value;
    }
}
