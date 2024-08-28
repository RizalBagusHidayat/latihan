<div id="EditBarangModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" aria-hidden="true">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Edit Barang Barang</p>
        </div>
        <form action="{{route('daftarbarang.edit')}}" method="POST">
            @csrf
            <input type="hidden" id="hidden-item-id">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id_barang">ID Barang</label>
                <p id="edit_id_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200">
                    Tes
                </p>
                <input type="hidden" name="id_barang" id="edit_id_barang_input" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value=""> 
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="edit_nama_barang" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="edit_jenis_barang" id="edit_jenis_barang">
                    @foreach ($jenisbarang as $items)
                        <option value="{{ $items->id }}">{{ $items->jenis_barang }}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stok">Stok</label>
                <input type="number" name="stok" id="edit_stok" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="satuan">Satuan</label>
                <select name="satuan" id="edit_satuan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($satuan as $item)
                        <option value="{{ intval($item->id)}}">{{ $item->satuan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-end pt-2">
                <button type="button" class="px-4 bg-gray-200 p-2 rounded-lg text-black hover:bg-gray-300 mr-2" onclick="closeEditModal()">Batal</button>
                <button type="submit" class="px-4 bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id) {
        // Tampilkan modal
        document.getElementById('EditBarangModal').classList.remove('hidden');

        // Ambil data barang dari server menggunakan Fetch API
        fetch(`/daftarbarang/${id}`)
            .then(response => response.json())
            .then(data => {
                // Isi form di modal dengan data yang diterima
                document.getElementById('hidden-item-id').value = data.id;
                document.getElementById('edit_id_barang').innerText = data.id_barang;
                document.getElementById('edit_id_barang_input').value = data.id_barang;
                document.getElementById('edit_nama_barang').value = data.nama_barang;
                document.getElementById('edit_jenis_barang').value = data.jenis_id;
                document.getElementById('edit_stok').value = data.stok;
                document.getElementById('edit_satuan').value = data.satuan_id;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function closeEditModal() {
        // Sembunyikan modal
        document.getElementById('EditBarangModal').classList.add('hidden');
    }
</script>
