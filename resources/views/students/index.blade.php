<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AA</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-200">
    <div class="flex">
        <table border="2" cellpadding="5" class="text-black">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Created At</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->created_at == null ? 'Na' : $student->created_at }}</td>
                    <td><a href="{{ route('students.edit', $student->id) }}">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="create m-3">
        <a class="bg-blue-700 p-2 text-white rounded" href="{{ route('students.create') }}">Create</a>
    </div>
</body>

</html>
