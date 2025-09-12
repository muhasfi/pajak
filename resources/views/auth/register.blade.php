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

                {{-- Title --}}
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Daftar Akun Baru</h1>

                {{-- Validation Errors --}}
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa fa-user"></i>
                            </span>
                            <x-input id="name" class="pl-10 block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" 
                                     type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <x-input id="email" class="pl-10 block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" 
                                     type="email" name="email" :value="old('email')" required />
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
                                     type="password" name="password" required autocomplete="new-password" />
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <div class="relative mt-1">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa fa-lock"></i>
                            </span>
                            <x-input id="password_confirmation" class="pl-10 block w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" 
                                     type="password" name="password_confirmation" required />
                        </div>
                    </div>

                    {{-- Sudah punya akun --}}
                    <div class="flex items-center justify-between mb-6">
                        <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                            Sudah punya akun?
                        </a>
                    </div>

                    {{-- Button --}}
                    <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition ease-in-out duration-150">
                        <i class="fa fa-user-plus mr-2"></i>Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
