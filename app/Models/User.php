<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'email',
        'username',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfilePembeli()
    {
        return $this->belongsTo(PembeliModel::class, 'id');
    }

    public function getMenu($param)
    {
        return $this->hasMany(DaftarMenuModel::class, 'id_penjual')->where('name_menu', 'LIKE', '%' . $param . '%')->get();
    }
    public function getPenjual()
    {
        return $this->hasMany(PenjualModel::class, 'id_penjual')->get();
    }
}
