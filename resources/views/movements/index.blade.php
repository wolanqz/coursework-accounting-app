<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Перемещения товара') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('movements.create') }}">Добавить перемещение товара</a>

                    <br /><br />

                    <table>
                        <thead>
                            <tr>
                                <th>Время создания</th>
                                <th>Тип перемещения товара</th>
                                <th>Направление перемещения товара</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movements as $movement)
                                <tr>
                                    <td>{{ $movement->created_at }}</td>
                                    <td>{{ $movement->movement_type_name }}</td>
                                    <td>{{ $movement->movement_direction_type_name }}</td>
                                    <td><a href="{{ route('movements.edit', $movement->id) }}">Редактировать</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
