<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\Pesanan;

class Customer extends Controller
{
    public function index()
    {
        $customerSession = session('customer');

        $id_customer = $customerSession['id_customer'];
        $nama_customer = $customerSession['nama_customer'];
        $no_meja = $customerSession['no_meja'];

        $customer = [
            'id_customer' => $id_customer,
            'nama_customer' => $nama_customer,
            'no_meja' => $no_meja

            // data langsung dipanggil tanpa harus menyertakan variable $customer
        ];

        
        
        return view('shared.navbar', ['customer' => $customer]);
    }
}
