<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">

        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">

            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Edit Student</h1>

            <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter full name"
                        class="w-full px-4 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ $student->name }}" />
                    @error('name')
                        <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com"
                        class="w-full px-4 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ $student->email }}" />
                    @error('email')
                        <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-700">Age</label>
                    <input type="number" id="age" name="age" placeholder="Enter age"
                        class="w-full px-4 py-2 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ $student->age }}" />
                    @error('age')
                        <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2.5 rounded-md font-semibold text-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    Update
                </button>
            </form>
        </div>

        <div class="mt-4">
            <a href="{{ route('students.index') }}"
                class="inline-block bg-gray-700 py-2 px-4 text-white font-semibold rounded-md hover:bg-gray-800 transition-colors duration-200">
                View All Students
            </a>
        </div>
    </div>
</body>

</html>
