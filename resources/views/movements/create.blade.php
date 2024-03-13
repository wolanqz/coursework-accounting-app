<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Новое перемещение товара') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('movements.store') }}">
                        @csrf

                        <select name="type_id" class="form-select" aria-label="Default select example">
                            @foreach ( $movement_types as $type )
                                <option value="{{ $type->id }}">
                                    {{ $type->name }} ({{ $type->movement_direction_type_name }})
                                </option>
                            @endforeach
                        </select>
                        <br /><br />
                        <button type="submit">Сохранить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
