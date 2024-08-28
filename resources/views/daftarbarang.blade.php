@extends ('layouts.main')

@section('main-section')
<section class="daftarbarang">
    <div class="header">
        <h1>Daftar Barang</h1>
    </div>
    
    <div class="flex gap-2 justify-between items-center">
        <div class="search-box mb-4 rounded-xl w-1/3 items-center">
            <input type="text" placeholder="Search..." class="w-full">
            <i class="fas fa-search"></i>
        </div>
        <Button class="bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-700" onclick="openTambahModal()">
            Tambah Barang
        </Button>
    </div>
    <div class="card">
        <table class="table-auto w-full text-xl">
            <thead class=" ">
                <tr class="">
                    <th class="py-4 rounded-tl-md">No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th class="py-4 rounded-tr-md"></th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @forelse ($barang as $item)
                    <tr class="">
                        <td class="py-4">{{ $i++ }}</td>
                        <td>{{ $item->id_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $jenisbarang[($item->jenis_id) - 1]->jenis_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $satuan[($item->satuan_id) - 1]->satuan }}</td>
                        <td class="w-full flex gap-4 justify-center items-center py-4">
                            <a href="
                            {{-- {{ route('barang.edit', $item->id) }} --}}
                                " 
                               class="text-white py-3 px-8 bg-blue-600 rounded-lg flex justify-center items-center hover:bg-blue-700">
                                <i class="fas fa-edit"></i>
                            </a> 
                        

                            <form action="
                            {{-- {{ route('barang.destroy', $item->id) }} --}}
                             " method="POST" class="inline-block hover">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white hover:bg-red-900 py-3 px-8 bg-red-600 rounded-lg flex justify-center items-center" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data barang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@include('daftarbarang.tambah')
@endsection
