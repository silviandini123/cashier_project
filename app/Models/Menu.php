<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table ='menu';
    protected $guarded =['id'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id','id');
    }

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id', 'menu_id');
    }
}


