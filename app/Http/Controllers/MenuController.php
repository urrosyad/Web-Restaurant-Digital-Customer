<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Meja;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $dataMenu = Menu::all();

        // Mendapatkan data customer dari session
        $customerData = session('customer');

        // session()->forget('customer');
        
        // dd($customerData);

        if ($customerData) {

            // Mengakses data customer
            $id_customer = $customerData['id_customer'];
            $nama_customer = $customerData['nama_customer'];
            $no_meja = $customerData['no_meja'];

            // dd($no_meja);

            // Menyimpan data customer untuk dikirim ke view
            $customer = [
                'id_customer' => $id_customer,
                'nama_customer' => $nama_customer,
                'no_meja' => $no_meja

                // data langsung dipanggil tanpa harus menyertakan variable $customer
            ];

            return view('menu.index',['dataMenu' => $dataMenu, 'customer'=>$customer]);
            
        }
        else{
            return redirect()->route('register.index');
        }


        
    }
}
    