    @php
        $customer = session('customer');
    @endphp
    
    
    
    <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-dark fixed-top py-lg-2 px-lg-5 my-auto">
            <div class="navbar-brand ms-4 ms-lg-0">
                <h1 class="text-primary m-0 animated slideInDown" data-wow-delay="0.3s">restaurant</h1>
                
                @if ($customer)
                    <h5 class="fs-5 mb-3 text-primary slideInDown">{{ $customer['nama_customer']}} {{ $customer['no_meja']}} </h5>
                @else
                    <h5 class="fs-5 mb-3 text-primary slideInDown"></h5>
                @endif
            </div>
    

            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-lg-nav ms-auto animated slideInDown d-flex flex-column">
                        <a href="{{ route('pesanan.index') }}" class="nav-item nav-link text-primary">
                            <span class="badge rounded-pill bg-primary">{{$jumlahPesanan}} </span>
                            <h5 class="mb-3 text-primary text-center slideInDown">
                                Pesanan
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    <!-- Navbar End -->