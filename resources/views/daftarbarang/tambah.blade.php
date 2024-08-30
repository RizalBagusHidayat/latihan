<div id="tambahBarangModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" aria-hidden="true">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Tambah Barang</p>
        </div>
        <form action="{{ route('daftarbarang.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_barang">ID Barang</label>
                <input type="text" name="id_barang" id="id_barang" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" hidden>Pilih Jenis Barang</option>
                    @foreach ($jenisbarang['data'] as $item)
                        <option value="{{ $item['id'] }}">{{ $item['jenis_barang'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stok">Stok</label>
                <input type="number" name="stok" id="stok" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="satuan">Satuan</label>
                <select name="satuan" id="satuan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" hidden>Pilih Satuan</option>
                    @foreach ($satuan['data'] as $item)
                        <option value="{{ $item['id'] }}">{{ $item['satuan'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end pt-2">
                <button type="button" class="px-4 bg-gray-200 p-2 rounded-lg text-black hover:bg-gray-300 mr-2" onclick="closeTambahModal()">Batal</button>
                <button type="submit" class="px-4 bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openTambahModal() {
        document.getElementById('tambahBarangModal').classList.remove('hidden');
    }

    function closeTambahModal() {
        document.getElementById('tambahBarangModal').classList.add('hidden');
    }
</script>
