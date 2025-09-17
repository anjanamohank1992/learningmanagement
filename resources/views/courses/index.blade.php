<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Courses</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">

<div class="container mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Courses</h1>
        <a href="{{ route('courses.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + Add Course
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>

    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-3 px-4 text-left">Title</th>
                <th class="py-3 px-4 text-left">Description</th>
                <th class="py-3 px-4 text-left">Price</th>
                <th class="py-3 px-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $course->title }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $course->description }}</td>
                    <td class="py-3 px-4 font-semibold">₹{{ number_format($course->price, 2) }}</td>
                    <td class="py-3 px-4 text-center space-x-2">
                        <a href="{{ route('courses.edit', $course->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this course?');"
                                    class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($courses->isEmpty())
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-500">
                        No courses available. <a href="{{ route('courses.create') }}" class="text-blue-600 underline">Add one</a>.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
