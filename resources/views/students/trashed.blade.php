<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-200">
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">

            <div class="p-6 flex justify-between items-center border-b border-gray-200">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">Trash - Deleted Students</h2>
                    <p class="text-sm text-gray-500 mt-1">Restore or permanently delete student records.</p>
                </div>
                <a href="{{ route('students.index') }}"
                    class="inline-block bg-gray-500 py-2 px-4 text-white font-semibold rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    &larr; Back to Students List
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Deleted At</th>
                            <th scope="col" class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($trashedStudents as $student)
                            {{-- This part runs if the trash is not empty --}}
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $student->id }}</td>
                                <td class="px-6 py-4">{{ $student->name }}</td>
                                <td class="px-6 py-4">{{ $student->email }}</td>
                                <td class="px-6 py-4">{{ $student->deleted_at->format('d M, Y H:i A') }}</td>

                                <td class="px-6 py-4 flex justify-center items-center gap-4">
                                    <form method="POST" action="{{ route('students.restore', $student->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="font-medium text-green-600 hover:underline">Restore</button>
                                    </form>

                                    <form method="POST" action="{{ route('students.forceDelete', $student->id) }}"
                                        onsubmit="return confirm('This action is irreversible and will permanently delete the student. Are you absolutely sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline">Delete
                                            Permanently</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{-- This part runs if the trash is empty --}}
                            <tr class="bg-white border-b">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    The trash is empty.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
