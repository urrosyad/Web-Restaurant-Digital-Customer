<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        $customerData = session('customer');
        // dd($customerData);

        if (!$customerData) {
            $dataMeja = Meja::all();
            return view('layouts.register', ['dataMeja' => $dataMeja] );
        }else{
            return redirect()->route('menu.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {

        try{

            $request->validate([
                'nama_customer' => 'required',
                'id_meja' => 'required',
            ]);
            
            $namaCustomer = $request->input('nama_customer');
            $idMeja = $request->input('id_meja');
            $noMeja = Meja::find($idMeja)['no_meja'];

            // dd($namaCustomer);

            $customer = Customer::create([
                'nama_customer' => $namaCustomer,
                'id_meja' => $idMeja,
            ]);
            
            // Menyimpan data customer yang register ke dalam session 
            session(['customer' => [
                'id_customer' => $customer->id_customer,
                'nama_customer' => $namaCustomer,
                'id_meja' => $idMeja,
                'no_meja' => $noMeja,
            ]]);
            
            return redirect()->route('menu.index');
        }
        catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('register.index');
        }
    }
}