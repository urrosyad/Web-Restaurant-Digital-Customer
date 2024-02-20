@extends('layouts.main')
@section('content')
  
  <!-- Menu Start -->
  <div class="container-xxl bg-light py-3 pt-5 wow fadeIn card-menu" data-wow-delay="0.3s" style="margin-top: 90px;">
        <div class="container">

        @if (session('success'))
            <div class="alert alert-primary text-center" id="success-alert">{{ session('success')}}</div>
        @endif

            <div class="container-fluid text-secondary mb-0 pb-3 bg-light" data-wow-delay="0.3s">
                <h2 class="display-4 text-dark py-4 text-center">Menu</h2>
                <div class="row g-4">
                    @if(session('error'))
                    <div class="alert alert-success my-3">
                        {{ session('success') }}
                    </div>
                    @endif

                        @foreach($dataMenu as $data)
                        <div class="col-3 col-sm-3 px-3 py-2 wow fadeInUp product-item" data-wow-delay="0.3s" data-bs-toggle="modal" data-id-menu="{{ $data->id_menu }}" data-bs-target="#modalBuy">
                            <div class="d-flex flex-column bg-primary overflow-hidden h-65 shadow rounded-3">
                                <div class="position-relative mt-auto">
                                    <img class="img-fluid" src="assets/img/ayam-pedas.jpg" alt="" style="width:100%;">
                                    <div class="product-overlay">
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-2 fs-5 text-white">{{ $data->nama_menu }}</h5>
                                    <div class="border-white bg-white rounded-pill mb-2 py-2">
                                        <span class="fs-5 fw-bold text-primary">
                                            Rp{{ $data->harga_menu }}
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
        
        
        <!-- Modal Start -->
    <div class="modal fade" id="modalBuy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title text-primary text-center" id="staticBackdropLabel">Pesan</h3>
                </div>
            <div class="modal-body d-flex justify-content-center ">
                <div class="text-center">
                    <form class="form-group mb-0" method="POST" action="{{ route('pesanan.store') }}">
                        @csrf
                        
                        <div class="input-group">
                            
                            <div id="decrease" class="btn btn-primary">-</div>
                            <input type="text" min="1" id="jumlah" name="jumlah_pesan" value="1 " class="form-control mx-2" readonly>
                            <div id="increase" class="btn btn-primary">+</div>

                            <input type="hidden" name="id_menu" id="menuIdInput" class="form-control mx-2">

                            {{-- Konfigurasi pengiriman notif --}}
                            <input type="hidden" id="txtfcmserver" value="AAAASr9fMxc:APA91bF7Fiu78EF9S1VzQP1Un_UyMRXhXrc5aLMFoHo5w705dfYdUHxHsu16aFvPhmeGMtwI0MIBw9z0tibLZSZu-3MlctKlQ9sYTWbwZuV3dsRXieRWWT-7V0zHP-RyNZkG-VvY4Yra">

                            <input type="hidden" id="txtfcmdevice" value="fQ8jxlPaTKmxyHT8VZDNfv:APA91bE46kNbHIiiN4tgvfnhHgC7LDicSiIyAnzuM4KuVh_0bbcS3fyQNvurWXOg9zg98YXg4eSV4aeDYLnQOLUYjimkZymZDrBSB5oLY3yXGXGOVBNl05cqKXJCczGQHbst6mC3Pe7h">
                            
                            <input type="hidden" id="txttitle" value="Pesanan Baru Dari {{ $customer['nama_customer'] }} ">

                            <input type="hidden" id="txtcontent" value="Segera Selesaikan Pesanan ini!!!">


                        </div>
                        <button type="button" class="btn btn-secondary my-3 px-2 text-center" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                        <button class="btn btn-primary my-3 px-2 text-center" type="submit" name="beli" onclick="sendNotification()"> Beli </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal End -->

    <script>
    // Untuk menghandle counter beli menu
    document.addEventListener('DOMContentLoaded', function () {
        let jumlahInput = document.getElementById('jumlah');

        document.getElementById('increase').addEventListener('click', function () {
            jumlahInput.value = Math.max(0, parseInt(jumlahInput.value) + 1);
        });

        document.getElementById('decrease').addEventListener('click', function () {
            jumlahInput.value = Math.max(1, parseInt(jumlahInput.value) - 1);
        });
    });

    // Untuk menghandle modal mendapat id_menu
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.product-item');

        menuItems.forEach(function(menu) {
            menu.addEventListener('click', function() {
                console.log(menu);
                const idMenu = menu.getAttribute('data-id-menu');
                document.getElementById('menuIdInput').value = idMenu;
            });
        });
    });

    setTimeout(function() {
            let alertElement = document.getElementById('success-alert');
            alertElement.style.opacity = '0';
            setTimeout(function() {
                alertElement.style.display = 'none';
            }, 1000); // Mengatur opacity untuk memberikan efek fade
        }, 2000); // setelah hilang total, kita menghilangkan area alert


        function sendNotification(){

            let txtfcmserver = document.getElementById("txtfcmserver")
            let txtfcmdevice = document.getElementById("txtfcmdevice")
            let txttitle = document.getElementById("txttitle")
            let txtcontent = document.getElementById("txtcontent")

            const fcmServerKey = txtfcmserver.value
            const fcmEndPoint = "https://fcm.googleapis.com/fcm/send"
            
            const message = {
                to: txtfcmdevice.value,
                notification:{
                    title: txttitle.value,
                    body: txtcontent.value,
                },
                data: {
                    key1: "value1",
                    key2: "value2"
                },
            };

            fetch(fcmEndPoint, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    Authorization: "key=" + fcmServerKey,
                },
                body: JSON.stringify(message),
            })
            .then((response) => response.json())
            .then((data) => {
                console.log("Sukses mengirim notifikasi")
            })
            .catch((error) => console.log("Error mengirim notifikasi", error))
        }
    </script>
    
    @endsection
