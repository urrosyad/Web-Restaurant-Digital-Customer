<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Pesanan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('shared.navbar', function ($view) {

            $id_customer = session('customer')['id_customer'];

            // Query untuk menghitung jumlah pesanan berdasarkan ID customer
            $jumlahPesanan = Pesanan::where('id_customer', $id_customer)->count();

            $view->with('jumlahPesanan', $jumlahPesanan);
        });
    }
}
