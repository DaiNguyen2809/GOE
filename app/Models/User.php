<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'phone'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) {
                $lastestUser = User::where('id', 'like', 'USZN%')->latest('id')->first();

                if ($lastestUser) {
                    $lastestUser = (int) substr($lastestUser->id, 4);
                    $newNumber = str_pad($lastestUser + 1, 4, "0", STR_PAD_LEFT);
                } else
                    $newNumber = '0000';

                $user->id = 'USZN' . $newNumber;
            }
        });
    }
}
