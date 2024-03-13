<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <a href="{{ route('movement_lines.create') }}">Добавить строчку движения товара</a>
        <br /><br />
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

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>
