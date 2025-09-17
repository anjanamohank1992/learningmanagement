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
        <h1 class="text-3xl font-bold text-gray-800">Courses</h1>

        <a href="{{ route('student.my-courses') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            My Courses
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($courses->isEmpty())
        <div class="text-center text-gray-500 py-10">
            No courses available.
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

                    <div class="text-center">
                        @if(in_array($course->id, $enrolledCourses ?? []))
                            <span class="inline-block bg-green-500 text-white px-4 py-2 rounded">
                                Enrolled
                            </span>
                        @else
                            <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                    Enroll
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

</body>
</html>
