<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $lecturer->nidn }} - {{ $lecturer->fullname }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- CONTENT HERE -->
                    <x-primary-button element="a" href="{{ route('lecturer.index') }}">
                        Kembali
                    </x-primary-button>
                    <br/><br/>
                    <hr/>
                    <x-table>
                        <x-slot name='header'>
                            <th>#</th>
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Tahun Masuk</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                        </x-slot>
                            @foreach($students as $student)
                            <tr>
                                {{-- <td>{{ ($lecturers->perPage() * ($lecturers->currentPage()-1))+$loop->iteration }}</td> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->npm }}</td>
                                <td>{{ $student->fullname }}</td>
                                <td>{{ $student->year_entry }}</td>
                                <td>{{ $student->group }}</td>
                                <td>{{ $student->department->name }}</td>
                            </tr>
                            @endforeach
                    </x-table>
                        {{-- {{ $lecturers->links() }} --}}
                    <!-- EBD CONTENT HERE -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
