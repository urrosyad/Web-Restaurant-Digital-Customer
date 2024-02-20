<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'id_customer',
        'nama_customer',
        'id_meja',
    ];
    public $timestamps = false;


    public function meja(){
        return $this->belongsTo(Meja::class, 'id_meja', 'id_meja');
    }
    
    
}
