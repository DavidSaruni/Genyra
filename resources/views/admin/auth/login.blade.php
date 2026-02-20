<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Genyra Group</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        genyra: {
                            primary: '#1e40af',
                            secondary: '#3b82f6',
                            accent: '#60a5fa',
                            dark: '#1e293b',
                            light: '#f1f5f9'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-8">
        <!-- Header -->
        <div class="text-center">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Genyra" class="h-16 w-auto rounded">
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Admin Login</h2>
            <p class="mt-2 text-sm text-gray-600">Sign in to access the admin dashboard</p>
        </div>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="space-y-4">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" required
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary"
                            placeholder="admin@genyra.com"
                            value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-genyra-primary focus:border-genyra-primary"
                            placeholder="Enter your password">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-genyra-primary focus:ring-genyra-primary border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-genyra-primary hover:bg-genyra-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-genyra-primary transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Sign In
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Genyra Group. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
