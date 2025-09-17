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
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">My Courses</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        </div>

        @if($courses->isEmpty())
            <div class="text-center text-gray-500 py-10">
                You have not enrolled in any courses yet.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $course)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-800">{{ $course->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                            <p class="text-gray-800 font-semibold mb-4">₹{{ number_format($course->price, 2) }}</p>
                        </div>
                        <span class="inline-block bg-green-500 text-white px-4 py-2 rounded text-center">
                        Enrolled
                    </span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>

