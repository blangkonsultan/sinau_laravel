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
                        <a class="" href="{{ route('unit.create') }}"><button
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">TAMBAH
                                UNIT</button>
                            </a>
                    </div>
                    <br>
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        NO
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        NAMA UNIT
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        AKSI
                                    </th>
                                </tr>
                                <tbody>
                                    @foreach ($units as $key => $unit )
                                        <tr class="bg-white ">
                                            <td class="py-4 px-6">{{ $key+1 }}</td>
                                            <td class="py-4 px-6">{{ $unit->nama_unit }}</td>
                                            <td class="py-4 px-6"><a href="#">Edit</a>
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
