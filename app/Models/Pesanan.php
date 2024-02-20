<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesanan extends Model
{
    /**
     * Pemanggilan nama table yang ada di table 
     * @var string
     */

     protected $table = 'pesanan';

     /**
      * Pendefinisian nama nama kolom yang dapat kita akses
      *@var array
      */

      protected $fillable = [
        'id_pesanan',
        'id_customer',
        'id_menu',
        'jumlah_pesan',
        'total_harga',
        'status_bayar'
      ];
      protected $primaryKey = 'id_pesanan'; // Menyetting default primary key table pesanan
      public $timestamps = false; // Mmebuat agar table bisa di akses ketika tidak ada kolom created dan upadted bawaan laravel


      // Pendefinisian Relasi table menu
      public function menu()
      {
          return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
      }

    // Method untuk menampilkan data Pesanan
      public static function getDataPesanan($id_customer)
      {
          // Jalankan query kustom untuk menampilkan data pesanan
          return self::select('pesanan.id_pesanan', 'menu.nama_menu', 'menu.harga_menu', 'customer.nama_customer', 'pesanan.jumlah_pesan', 'pesanan.total_harga')
          ->join('menu', 'pesanan.id_menu', '=', 'menu.id_menu')
          ->join('customer', 'pesanan.id_customer', '=', 'customer.id_customer')
          ->where('pesanan.id_customer', $id_customer)
          ->get(); 
  
      }

    // method untuk create pesanan
      public static function createPesanan($id_menu, $id_customer, $jumlah_pesan, $total_harga)
      {
          return self::create([
              'id_menu' => $id_menu,
              'id_customer' => $id_customer,
              'jumlah_pesan' => $jumlah_pesan,
              'total_harga' => $total_harga,
          ]);
      }


      // Method untuk menambahkan seluruh total_harga sesuai id_customer 
      public static function getTotalPesanan($id_customer)
      {
          return self::where('id_customer', $id_customer)->sum('total_harga');
      }

      
      public function hitungTotalHarga()
      {
          $hargaMenu = $this->menu->harga_menu; // mengambil kolom harga_menu dari table menu
          return $this->jumlah_pesan * $hargaMenu;
      }

}
