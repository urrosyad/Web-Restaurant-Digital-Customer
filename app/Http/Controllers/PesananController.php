<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $customerSession = session('customer');

        
        if ($customerSession){ // PENGECEKAN SESSION
    
            
            $id_customer = $customerSession['id_customer'];
            $totalPesanan = Pesanan::getTotalPesanan($id_customer); // SUDAH BENAR
            $dataPesan = Pesanan::getDataPesanan($id_customer); // SUDAH BENAR
            
            return view('menu.pesanan', [
                'dataPesan' => $dataPesan,
                'totalPesanan' => $totalPesanan,
                'id_customer' => $id_customer,
                'customerSession' => $customerSession]);
        }
        else{
            return redirect()->route('register.index');
        }

    }

    public function store(Request $request)
    {
        try{

            $customerData = session('customer');

            // Dapatkan data yang dikirimkan melalui form
            $id_menu = $request->input('id_menu');

            $menu = Menu::find($id_menu);
            
            $id_customer = $customerData['id_customer'];
            $jumlah_pesan = $request->input('jumlah_pesan');
            $total_harga =  $menu->harga_menu * $jumlah_pesan ;
            // $status_bayar = 'false';

            
            // Panggil fungsi createPesanan dari model Pesanan
            Pesanan::createPesanan($id_menu, $id_customer, $jumlah_pesan, $total_harga);


            return redirect()->route('menu.index')->with('success','menu dimasukkan ke pesananMu');

        }catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('menu.index');

        }
        
    }


    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        try {
            $pesanan -> delete();
            return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Data gagal dihapus!');
        }
    }

    
    public function checkout(){

        $customerSession = session('customer');
        // dd($customerSession);

        if ($customerSession) { //CHECK SESSION
        
        // mengakhiri session
        session()->forget('customer');

        return view('layouts.checkout');

        }

        return redirect()->route('pesanan.index');
    }
}
