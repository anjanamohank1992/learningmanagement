<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Register</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register" class="space-y-4">
        @csrf

        <div>
            <label class="block text-gray-700 mb-1" for="name">Name</label>
            <input id="name" type="text" name="name" placeholder="Enter your name"
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1" for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Enter your email"
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1" for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Enter your password"
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1" for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password"
                   class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div>
            <label class="block text-gray-700 mb-1" for="role">Role</label>
            <select id="role" name="role"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit"
                class="w-full bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition duration-200">
            Register
        </button>
    </form>

    <p class="mt-4 text-center text-gray-600">
        Already have an account? <a href="/login" class="text-indigo-500 underline">Login here</a>
    </p>
</div>

</body>
</html>
