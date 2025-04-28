


<div class=" col-span-full space-y-4">
    <!-- Search Form -->
    <div class="flex space-x-4 mb-4">
        <div class="flex-grow">
            <label for="search" class="block text-sm font-medium">Pencarian</label>
            <div class="flex mt-1">
                <select wire:model="searchField" id="searchField" class="border-gray-300 rounded-l-md shadow-sm">
                    <option value="all">Semua</option>
                    <option value="ID_Anggota">ID Anggota</option>
                    <option value="Nama_Anggota">Nama Anggota</option>
                    <option value="Jenis_Produk">Jenis Produk</option>
                    <option value="Bidang_Usaha">Bidang Usaha</option>
                </select>
                <input wire:model.debounce.300ms="search" wire:keydown.enter="refreshData" type="text" id="search" placeholder="Search..." class="flex-grow border-gray-300 rounded-r-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
        </div>
        
        <div class="mt-6">
            <button wire:click="refreshData" class="search-button">
                Search
            </button>
            
        </div>

    </div>
    <!-- Filter Form -->
    <div  class="flex space-x-4">


    
<!-- Filter Tempat tinggal berdasarkan alamat pribadi -- START -->   

{{-- 
        <!-- Provinsi Filter -->
        <div>
            <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
            <select wire:model="provinsi" id="provinsi" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="">Pilih Provinsi</option>
                @foreach ($data->unique('Provinsi_Tinggal') as $item)
                    <option value="{{ $item->Provinsi_Tinggal }}">{{ $item->Provinsi_Tinggal }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kabupaten Filter -->
        <div>
            <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
            <select wire:model="kabupaten" id="kabupaten" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="">Pilih Kabupaten</option>
                @foreach ($data->unique('Kabupaten_Tinggal') as $item)
                    <option value="{{ $item->Kabupaten_Tinggal }}">{{ $item->Kabupaten_Tinggal }}</option>
                @endforeach
            </select>
        </div> 
         --}}

        <!-- Kecamatan Filter -->
        <div>
            <label for="kecamatan" class="block text-sm font-medium">Kecamatan Anggota</label>
            <select wire:model="kecamatan" wire:change="refreshData" id="kecamatan" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="">Pilih Kecamatan</option>
                @foreach ($data->unique('Kecamatan_Tinggal') as $item)
                    <option value="{{ $item->Kecamatan_Tinggal }}">{{ $item->Kecamatan_Tinggal }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kelurahan Filter -->
        <div>
            <label for="kelurahan" class="block text-sm font-medium">Kelurahan Anggota</label>
            <select wire:model="kelurahan" wire:change="refreshData" id="kelurahan" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="">Pilih Kelurahan</option>
                @foreach ($data->unique('Kelurahan_Tinggal') as $item)
                    <option value="{{ $item->Kelurahan_Tinggal }}">{{ $item->Kelurahan_Tinggal }}</option>
                @endforeach
            </select>
        </div>
        <!-- Kota Tinggal Filter -->
        <div>
            <label for="kotatinggal" class="block text-sm font-medium">Kota </label>
            <select wire:model="kotatinggal" wire:change="refreshData" id="kotatinggal" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                <option value="">Pilih Kota</option>
                @foreach ($data->unique('Kota_Tinggal') as $item)
                    <option value="{{ $item->Kota_Tinggal }}">{{ $item->Kota_Tinggal }}</option>
                @endforeach
            </select>
        </div>

        <div class="invisible">
            <label for="kelurahanusaha" class="block text-sm font-medium text-gray-700">Label Kosong</label>
        </div>

        


<!-- Filter Tempat tinggal berdasarkan alamat USAHA -- START -->
{{-- 
<!-- Provinsi Usaha Filter -->
<div>
    <label for="provinsiusaha" class="block text-sm font-medium text-gray-700">Provinsi Usaha</label>
    <select wire:model="provinsiusaha" id="provinsiusaha" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">Pilih Provinsi</option>
        @foreach ($data->unique('Provinsi_Usaha') as $item)
            <option value="{{ $item->Provinsi_Usaha }}">{{ $item->Provinsi_Usaha }}</option>
        @endforeach
    </select>
</div>

<!-- Kabupaten Usaha Filter -->
<div>
    <label for="kabupatenusaha" class="block text-sm font-medium text-gray-700">Kabupaten Usaha</label>
    <select wire:model="kabupatenusaha" id="kabupatenusaha" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">Pilih Kabupaten</option>
        @foreach ($data->unique('Kabupaten_Usaha') as $item)
            <option value="{{ $item->Kabupaten_Usaha }}">{{ $item->Kabupaten_Usaha }}</option>
        @endforeach
    </select>
</div> 
 --}}


<!-- Kecamatan Usaha Filter -->
<div>
    <label for="kecamatanusaha" class="block text-sm font-medium">Kecamatan Usaha</label>
    <select wire:model="kecamatanusaha" wire:change="refreshData" id="kecamatanusaha" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">Pilih Kecamatan</option>
        @foreach ($data->unique('Kecamatan_Usaha') as $item)
            <option value="{{ $item->Kecamatan_Usaha }}">{{ $item->Kecamatan_Usaha }}</option>
        @endforeach
    </select>
</div>

<!-- Kelurahan Usaha Filter -->
<div>
    <label for="kelurahanusaha" class="block text-sm font-medium">Kelurahan Usaha</label>
    <select wire:model="kelurahanusaha" wire:change="refreshData" id="kelurahanusaha" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">Pilih Kelurahan</option>
        @foreach ($data->unique('Kelurahan_Usaha') as $item)
            <option value="{{ $item->Kelurahan_Usaha }}">{{ $item->Kelurahan_Usaha }}</option>
        @endforeach
    </select>
</div>
<!-- Kota Tinggal Usaha Filter -->
<div>
    <label for="kotatinggalusaha"  class="block text-sm font-medium">Kota Usaha </label>
    <select wire:model="kotatinggalusaha" wire:change="refreshData" id="kotatinggalusaha" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
        <option value="">Pilih Kota</option>
        @foreach ($data->unique('Kota_Usaha') as $item)
            <option value="{{ $item->Kota_Usaha }}">{{ $item->Kota_Usaha }}</option>
        @endforeach
    </select>
</div>
    </div>

<!-- Filter Tempat tinggal berdasarkan alamat pribadi -- END -->

   <!-- Tombol Reset Filter -->
<section class="reset-filter-section">
    
    <div>
        <button wire:click="resetFilters"  class="reset-button" >
            Reset Filter
        </button>
    </div>
</section>

<!-- Tampilkan jumlah anggota berdasarkan filter -->
<div class="mt-6">
    <h3 class="text-lg font-semibold ">Jumlah Anggota</h3>
    <div class="bg-white p-4 mt-2 border rounded-md shadow-md">
        <p class="text-gray-700" wire:change="refreshData">Jumlah Anggota Terpilih: <strong>{{ $data->count() }}</strong> dari total anggota: <strong>{{ $allMembersCount }}</strong>
       
        </p>
        
        
    </div>

    <div class="overflow-y-auto max-h-96 border rounded-md shadow-md">
        <table class="w-full text-left">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nama</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Usaha</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Domisili</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Lokasi</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $anggota)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $anggota->ID_Anggota}}</td>
                        <td class="px-4 py-2 ">{{ $anggota->Nama_Anggota}}</td>
                        <td class="px-4 py-2 ">{{ $anggota->Nama_Usaha }}</td>
                        <td class="px-4 py-2 ">{{ $anggota->Kelurahan_Usaha }}</td>
                        <td class="px-4 py-2 ">{{ $anggota->Kelurahan_Usaha }}</td>
                        <td class="px-4 py-2">
                            <button wire:click="showDetail({{ $anggota->id }})"
                                class="px-3 py-1 bg-blue-500 rounded-md hover:bg-blue-600">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $data->links() }}
    </div>

    @if ($selectedAnggota)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70">
        <div class="bg-white p-6 rounded-md shadow-lg w-96">
            <h2 class="text-lg font-bold mb-4">Detail Anggota</h2>
            <p><strong>Nama:</strong> {{ $selectedAnggota->Nama_Anggota }}</p>
            <p><strong>Kecamatan:</strong> {{ $selectedAnggota->Kecamatan_Tinggal }}</p>
            <p><strong>Kelurahan:</strong> {{ $selectedAnggota->Kelurahan_Tinggal }}</p>
            <p><strong>Kota:</strong> {{ $selectedAnggota->Kota_Tinggal }}</p>
            <p><strong>Nama Usaha:</strong> {{ $selectedAnggota->Nama_Usaha }}</p>
            <p><strong>Jenis Produk:</strong> {{ $selectedAnggota->Jenis_Produk }}</p>
            <p><strong>Foto Produk:</strong></p>
            <img height="150" width="150" src="{{ asset('storage/' . $selectedAnggota->Foto_Produk) }}" alt="Foto Produk" class="foto-produk">

    
            <button wire:click="closeModal"
                class="mt-4 px-4 py-2 bg-red-500  rounded-md hover:bg-red-600">
                Close
            </button>
        </div>
    </div>

    @endif

</div>


<style>
    .filter-container {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
    }
    .filter-search {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 8px;
        flex-grow: 1;
    }
    .filter-button {
        padding: 8px 16px;
        background-color: #4f46e5; /* Indigo 600 */
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .filter-button:hover {
        background-color: #4338ca; /* Indigo 700 */
    }
    .search-button {
        padding: 8px 16px;
        background-color: #3b82f6; /* Warna biru (blue-500) */
        color: black;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
        outline: none;
    }

    .search-button:hover {
        background-color: #2563eb; /* Warna biru lebih gelap (blue-600) */
    }

    .search-button:focus {
        box-shadow: 0 0 0 3px rgba(147, 197, 253, 0.6); /* Ring focus warna biru (blue-300) */
    }

    .reset-filter-section {
        display: flex;
        justify-content: flex-end; /* Taruh isi section di kanan */
        padding: 8px;
    }

    .reset-button {
        font-weight: 600; /* font-semibold */
        color: rgb(0, 0, 0);
        padding: 8px 16px; /* px-4 py-2 */
        margin-top: 16px; /* mt-4 */
        background-color: rgb(145, 145, 145);
        border: none;
        border-radius: 6px; /* rounded-md */
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
        outline: none;
    }

    .reset-button:hover {
        background-color: #dc2626; /* merah lebih gelap (red-600) */
    }

    .reset-button:focus {
        box-shadow: 0 0 0 3px rgba(252, 165, 165, 0.6); /* ring merah muda (red-300) */
    }
</style>


