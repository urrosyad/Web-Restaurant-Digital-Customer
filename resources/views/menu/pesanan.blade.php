@extends('layouts.main')

@section('content')
@php
        function formatCurrency($amount) {
        return 'Rp'.number_format($amount, 2, ',', '.');
    }
@endphp
<div class="container-fluid bg-light text-secondary my-5 wow fadeIn" data-wow-delay="0.1s"></div>
<!-- Pesanan Start -->

<div class="container-fluid bg-light text-secondary my-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container-xxl ">
        @if (session('success'))
        <div class="alert alert-primary text-center mt-5" id="success">{{ session('success')}}</div>
        @endif

        {{-- @foreach($dataPesan as $key => $data)
            @if ($key === 0) --}}
            <h1 class="display-6 text-center text-dark my-5">Pesanan {{ $customerSession['nama_customer']}}</h1>
            {{-- @endif
                @endforeach --}}

            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Harga Menu</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse($dataPesan ?? [] as $data)
                        <tr>
                                <th>{{$no++}}</th>
                                <td>{{ $data->nama_menu }}</td>
                                <td>{{ $data->jumlah_pesan }}x</td>
                                <td>{{ formatCurrency($data->harga_menu)}}</td>
                                <td>{{ formatCurrency($data->total_harga) }}</td>
                                <td>
                                    <form action="{{ route('pesanan.destroy', ['id' => $data->id_pesanan] ) }}" method="POST">
                                        @csrf
                                        @method('DELETE') <!-- Tambahkan metode DELETE -->
                                        <button type="submit" class="btn btn-danger btn-sm mx-2">Hapus</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            
                            @empty
                            <tr>
                                <td class="fs-3 text-center fw-bold" colspan="6">{{ isset($customerSession) ? $customerSession['nama_customer'] : '' }} belum memesan apapun!</td>
                            </tr>
                            @endforelse
                            
                        </tbody>

                        @if($totalPesanan > 0)
                        <tr class="fw-bold">
                            <td colspan="4" class="text-end">Total Pesanan</td>
                            <td>{{ formatCurrency($totalPesanan) }}</td>
                            <td></td>
                        </tr>
                        @endif

                </table>
                <div class="action button d-flex flex-row gap-3">
                    <a href="{{route('menu.index')}}" class="btn btn-warning text-white rounded-pill">Lanjutkan Belanja</a>
                    <form action="{{ route('pesanan.checkout')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_customer" value="{{ $customerSession['id_customer'] }}">
                        <button type="submit" class="btn btn-success rounded-pill">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Pesanan END -->

<script>
        setTimeout(function() {
            let alertElement = document.getElementById('success');
            alertElement.style.opacity = '0';
            setTimeout(function() {
                alertElement.style.display = 'none';
            }, 1000); // Mengatur opacity untuk memberikan efek fade
        }, 3000); // setelah hilang total, kita menghilangkan area alert
</script>
@endsection