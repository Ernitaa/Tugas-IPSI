<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMenuModel extends Model
{
    use HasFactory;
    protected $table = 'daftar_menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name_menu', 'price', 'picture', 'id_penjual'
    ];
}
