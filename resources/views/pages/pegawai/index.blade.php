<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session()->has('Success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            <span class="font-medium">{{ session()->get('Success') }}</span>
                        </div>
                    @endif
                    <div class="flex">
                        <a class="" href="{{ route('pegawai.create') }}"><button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">TAMBAH
                                PEGAWAI</button>
                        </a>
                    </div>
                    <br>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-5000">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        NO
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        NIP
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        NIK
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        NAMA
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        JENIS KELAMIN
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        JABATAN
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        UNIT
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        TANGGAL LAHIR
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        AlAMAT
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        AKSI
                                    </th>
                                </tr>
                            <tbody>
                                @foreach ($pegawai as $key => $p)
                                    <tr class="bg-white ">
                                        <td class="py-4 px-6">{{ $key + 1 }}</td>
                                        <td class="py-4 px-6">{{ $p->nip }}</td>
                                        <td class="py-4 px-6">{{ $p->nik }}</td>
                                        <td class="py-4 px-6">{{ $p->nama }}</td>
                                        <td class="py-4 px-6">{{ $p->gender == '1' ? 'Pria' : 'Wanita' }}</td>
                                        <td class="py-4 px-6">{{ $p->jabatan->nama_jabatan }}</td>
                                        <td class="py-4 px-6">{{ $p->unit->nama_unit }}</td>
                                        <td class="py-4 px-6">{{ date('d-M-Y', strtotime($p->dob))}}</td>
                                        <td class="py-4 px-6">{{ $p->alamat }}</td>
                                        <td>
                                            <div class="m-3">
                                                <a href="{{ route('pegawai.edit', $p->id) }}"><button type="button"
                                                        class="py-2 px-3 text-xs font-medium text-center text-white
                                            bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Edit</button>
                                                </a>
                                            </div>
                                            <div class="m-3">
                                                <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="py-2 px-3 text-xs font-medium text-center text-white
                                                 bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
