<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактирование перемещения товара') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('movements.update', $movement->id) }}">
                        @method('PUT')
                        @csrf
                        <select name="type_id" class="form-select" aria-label="Default select example">
                            @foreach ( $movement_types as $type )
                                <option
                                @if ( $movement->movement_type_id == $type->id )
                                    selected
                                @endif
                                value="{{ $type->id }}">
                                    {{ $type->name }} ({{ $type->movement_direction_type_name }})
                                </option>
                            @endforeach
                        </select>
                        <br /><br />
                        <button type="submit">Сохранить</button>
                    </form>

                    <br /><br />

                    <form method="POST" action="{{ route('movement_lines.store') }}">
                        @csrf
                        <input type="hidden" name="movement_id" value="{{ $movement->id }}"></input>
                        <button type="submit">Добавить строку движения товара</button>
                    </form>

                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Время создания</th>
                                {{-- <th>Направление перемещения товара</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movement_lines as $line)
                            <tr>
                                {{-- <option value="1">{{ $movement->movement_direction_type_name}} ({{ $type->direction_name }})</option> --}}
                                <td>{{ $line->id }}</td>
                                <td>{{ $line->created_at }}</td>
                                {{-- <td>{{ $movement->movement_direction_type_name }}</td> --}}
                                <td>
                                    {{-- <a href="{{ route('movement_lines.destroy', $line->id) }}">Удалить</a> --}}
                                    <form method="POST" action="{{ route('movement_lines.destroy', $line->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' onclick="return confirm ('Вы уверены?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
