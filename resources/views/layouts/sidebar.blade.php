<aside class="sidebar justify-between">
    <div class="">
        <div class="sidebar-header font-semibold text-2xl mb-5">
            <h2>Admin Dashboard</h2>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="{{route('dashboard')}}" class="{{Route::currentRouteName() == 'dashboard' ? 'active bg-blue-600' : 'hover:bg-gray-200 hover:text-blue-600'}} px-4 py-2 rounded-md"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{route('daftarbarang')}}" class="{{Route::currentRouteName() == 'daftarbarang' ? 'active bg-blue-600' : 'hover:bg-gray-200 hover:text-blue-600'}} px-4 py-2 rounded-md"><i class="fas fa-th-list"></i> Daftar Barang</a></li>
                <li><a href="{{route('barangmasuk')}}" class="{{Route::currentRouteName() == 'barangmasuk' ? 'active bg-blue-600' : 'hover:bg-gray-200 hover:text-blue-600'}} px-4 py-2 rounded-md"><i class="fas fa-archive"></i> Barang Masuk</a></li>
                <li><a href="{{route('barangkeluar')}}" class="{{Route::currentRouteName() == 'barangkeluar' ? 'active bg-blue-600' : 'hover:bg-gray-200 hover:text-blue-600'}} px-4 py-2 rounded-md"><i class="fas fa-arrow-circle-up"></i> Barang Keluar</a></li>
                <li><a href="{{route('jenisbarang')}}" class="{{Route::currentRouteName() == 'jenisbarang' ? 'active bg-blue-600' : 'hover:bg-gray-200 hover:text-blue-600'}} px-4 py-2 rounded-md"><i class="fas fa-clipboard"></i> Jenis Barang</a></li>
                <li><a href="{{route('satuan')}}" class="{{Route::currentRouteName() == 'satuan' ? 'active bg-blue-600' : 'hover:bg-gray-200 hover:text-blue-600'}} px-4 py-2 rounded-md"><i class="fas fa-boxes"></i> Satuan</a></li>
            </ul>
        </nav>
    </div>
    <div class="w-full"> 
        <form action="{{ route('logout') }}" method="post" class="w-full">
            @csrf
            <button class="bg-red-500 px-2 py-1 rounded text-white w-full hover:bg-red-600" type="submit">
                Logout
            </button>
        </form>
    </div>
</aside>