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
                    <div class="flex">
                        <a class="" href="{{ route('pegawai.create') }}"><button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">TAMBAH
                                PEGAWAI</button>
                            </a>
                    </div>
                    <br>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    {{-- @foreach ($pegawai as $key => $p )
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="py-4 px-6">{{ $key+1 }}</td>
                                            <td class="py-4 px-6">{{ $p->nama_unit }}</td>
                                            <td class="py-4 px-6"><a href="#">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
