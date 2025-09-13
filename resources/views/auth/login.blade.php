<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <div class="w-full max-w-md">
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8">
                
                {{-- Logo --}}
                <div class="flex justify-center mb-6">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 text-indigo-600" />
                    </a>
                </div>

                {{-- Session Status --}}
                <x-auth-session-status class="mb-4 text-center text-green-600 font-semibold" :status="session('status')" />

                {{-- Validation Errors --}}
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                {{-- Title --}}
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Masuk ke Akun Anda</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <x-input id="email" class="pl-10 block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" 
                                     type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa fa-lock"></i>
                            </span>
                            <x-input id="password" class="pl-10 block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                                     type="password" name="password" required autocomplete="current-password" />
                        </div>
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" 
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-opacity-50" 
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition ease-in-out duration-150">
                        <i class="fa fa-sign-in-alt mr-2"></i>Masuk
                    </button>

                    {{-- Register Link --}}
                    @if (Route::has('register'))
                    <p class="mt-6 text-center text-sm text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">Daftar sekarang</a>
                    </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
