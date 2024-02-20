<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * Pemanggilan nama table yang ada di table 
     * @var string
     */

     protected $table = 'menu';
     protected $primaryKey = 'id_menu';
     /**
      * Pendefinisian nama nama kolom yang dapat kita akses
      *@var array
      */

      protected $fillable = [
        'id_menu',
        'nama_menu',
        'stok_menu',
        'harga_menu'
      ];

}
