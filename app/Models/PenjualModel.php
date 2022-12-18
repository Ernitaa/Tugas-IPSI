<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualModel extends Model
{
    use HasFactory;
    protected $table = 'penjual';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'id_penjual', 'nama', 'nama_warung', 'lokasi', 'nomer_telepon'
    ];

    public function getMenu($param)
    {
        return $this->hasMany(DaftarMenuModel::class, 'id_penjual')->where('name_menu', 'LIKE', '%' . $param . '%')->get();
    }
}
