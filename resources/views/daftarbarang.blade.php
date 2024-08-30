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
        <table class="table-auto border w-full text-xl">
            <thead class="border ">
                <tr class="">
                    <th class="py-4 rounded-tl-md">No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th class="py-4 rounded-tr-md"></th>
                </tr>
            </thead>
            
            <tbody class="">
                @php $i = 1 @endphp
                @forelse ($barang['data'] as $item)
                    <tr class="border">
                        <td class="py-4">{{ $i++ }}</td>
                        <td>{{ $item['id_barang'] }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ $jenisbarang['data'][($item['jenis_id']) - 1]['jenis_barang'] }}</td>
                        <td>{{ $item['stok'] }}</td>
                        <td>{{ $satuan['data'][($item['satuan_id']) - 1]['satuan'] }}</td>
                        <td class="w-full flex gap-4 justify-center items-center py-4">
                            <button onclick="openEditModal({{$item['id']}})" 
                               class="text-white py-3 px-8 bg-blue-600 rounded-lg flex justify-center items-center hover:bg-blue-700">
                                <i class="fas fa-edit"></i>
                            </button> 
                            <form action="
                            {{ route('daftarbarang.destroy', $item['id_barang']) }}
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
@include('daftarbarang.edit')
@endsection
