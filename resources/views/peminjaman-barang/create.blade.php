<x-layout>
    <x-slot:title>Peminjaman Barang</x-slot:title>

    <div class="flex flex-wrap">
    @foreach ($kode_barangs as $kode_barang)
    <div class="cursor-pointer hover:shadow-lg p-4 border rounded-xl w-50 m-2">
        <h2>{{ $kode_barang->dataBarang->nama_barang }}</h2>
        <p>{{ $kode_barang->kode_barang }}</p>
        <div class="flex">
        <form action="{{ url('/cart/add/' . $kode_barang->kode_barang) }}" method="POST" >
            @csrf


                <button class="mt-2 mr-2 text-sm bg-blue-500 text-white px-3 py-1 rounded">
                    Tambah
                </button>
            

        </form>
        <form action="{{ url('/cart/remove/' . $kode_barang->kode_barang) }}" method="POST">
            @csrf


                <button class="mt-2 text-sm bg-blue-500 text-white px-3 py-1 rounded">
                    Remove
                </button>
            

        </form>
        </div>
    </div>
    @endforeach
    </div>
    <div class="mt-4 p-3 md:p-6 bg-white rounded-lg shadow-md flex flex-col  ">
            <p class="text-gray-600">Keranjang</p>
        

    @php
        $cart = session('cart', []);
        $count = collect($cart)->sum('qty');
    @endphp

@foreach ($cart as $kode => $item)
<div>
    <p>Kode: {{ $kode }}</p>
    <p>Nama: {{ $item['nama'] }}</p>
    <p>Jumlah: {{ $item['qty'] }}</p>
</div>
<br>
@endforeach
<br>
<p>Total : {{ $count }}</p>
</div>
</x-layout>
