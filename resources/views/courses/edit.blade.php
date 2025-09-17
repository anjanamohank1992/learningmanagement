<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($course) ? 'Edit Course' : 'Add Course' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

<div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">
        {{ isset($course) ? 'Edit Course' : 'Add New Course' }}
    </h1>

    <form method="POST" action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" class="space-y-4">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif

        <div>
            <label for="title" class="block text-gray-700 mb-1 font-semibold">Title</label>
            <input type="text" name="title" id="title" placeholder="Course Title"
                   value="{{ $course->title ?? '' }}"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="description" class="block text-gray-700 mb-1 font-semibold">Description</label>
            <textarea name="description" id="description" placeholder="Course Description"
                      class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ $course->description ?? '' }}</textarea>
        </div>

        <div>
            <label for="price" class="block text-gray-700 mb-1 font-semibold">Price</label>
            <input type="text" name="price" id="price" placeholder="Price"
                   value="{{ $course->price ?? '' }}"
                   pattern="[0-9]{1,10}(\.[0-9]{1,2})?"
                   title="Enter up to 10 digits and optionally 2 decimal places"
                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
            {{ isset($course) ? 'Update Course' : 'Add Course' }}
        </button>

        <a href="{{ route('courses.index') }}" class="block text-center mt-4 text-gray-600 underline hover:text-gray-800">
            Back to Courses
        </a>
    </form>
</div>

</body>
<script>
    const priceInput = document.getElementById('price');

    priceInput.addEventListener('input', function() {
        // Remove any character that is not a digit or a dot
        let value = this.value.replace(/[^0-9.]/g, '');

        // Only allow one dot
        const parts = value.split('.');
        if(parts.length > 2){
            value = parts[0] + '.' + parts[1];
        }

        // Limit digits before decimal to 10
        const [integerPart, decimalPart] = value.split('.');
        if(integerPart.length > 10){
            value = integerPart.substring(0, 10);
            if(decimalPart !== undefined){
                value += '.' + decimalPart;
            }
        }

        // Limit decimal to 2 digits
        if(decimalPart !== undefined && decimalPart.length > 2){
            value = integerPart + '.' + decimalPart.substring(0,2);
        }

        this.value = value;
    });
</script>
</html>
