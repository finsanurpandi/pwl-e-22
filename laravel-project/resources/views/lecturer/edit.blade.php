<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- CONTENT HERE -->
                    <x-primary-button element="a" href="{{ route('lecturer.index')}}">
                        KEMBALI
                    </x-primary-button>
                    <br/><br/>
                    <hr/>
                            <div class="max-w-xl">
                                <form method="POST" action="{{ route('lecturer.update', $lecturer->id) }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('PATCH')
                                    <div>
                                        <x-input-label for="nidn" :value="__('NIDN')" />
                                        <x-text-input id="nidn" name="nidn" type="text" class="mt-1 block w-full" value="{{ old('nidn', $lecturer->nidn) }}" required/>
                                            <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="firstname" :value="__('Nama Depan')" />
                                        <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" value="{{ old('firstname', $lecturer->firstname) }}" required/>
                                            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="last_name" :value="__('Nama Belakang')" />
                                        <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" value="{{ old('last_name', $lecturer->last_name) }}" required/>
                                            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="department_id" :value="__('Program Studi')" />
                                        <x-select-option name="department_id" id="department_id" required>
                                            <option value=""> --- </option>
                                            @foreach(\App\DepartmentEnum::cases() as $key => $value)
                                                @if(old('department_id', $lecturer->department_id) == $value)
                                                    <option value="{{ $value }}" selected>{{ $value->name }}</option>
                                                @else
                                                    <option value="{{ $value }}">{{ $value->name }}</option>
                                                @endif
                                            @endforeach
                                        </x-select-option>
                                    </div>
                                    <x-primary-button>
                                        UPDATE
                                    </x-primary-button>
                                </form>
                            </div>
                    <!-- END CONTENT HERE -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
