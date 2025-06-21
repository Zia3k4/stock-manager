@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex">
        <!-- Main Content Container -->
        <div class="flex-1 flex flex-col lg:flex-row">

            <!-- Left Box - Company Information -->
            <div class="lg:w-1/2 bg-white p-8 lg:p-12 flex flex-col justify-center">
                <div class="max-w-lg mx-auto lg:mx-0">
                    <!-- Who We Are Section -->
                    <div class="mb-8">
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6">
                            Quem somos?
                        </h2>
                        <div class="space-y-4 text-gray-700 leading-relaxed">
                            <p>
                                Somos uma empresa dedicada a oferecer materiais e acessórios de alta qualidade,
                                cuidadosamente selecionados para transformar sua casa em um verdadeiro lar.
                            </p>
                            <p>
                                Acreditamos que cada detalhe faz diferença no bem-estar do dia a dia, por isso,
                                unimos conforto, estilo e durabilidade em tudo o que oferecemos.
                            </p>
                            <p>
                                Nosso compromisso é com a sua satisfação e com a construção de ambientes mais
                                aconchegantes, funcionais e cheios de vida.
                            </p>
                        </div>
                    </div>

                    <!-- What We Offer Section -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                            O que oferecemos:
                        </h3>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Materiais básicos: cimento, areia, pedra, tijolos e blocos.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Ferragens: vergalhões, arames, telas e estruturas metálicas.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Materiais hidráulicos: tubos, conexões, caixas d'água.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Elétricos: fios, cabos, tomadas, disjuntores e luminárias.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Tintas e acabamentos: tintas, massas, pincéis, rolos.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Pisos e revestimentos: cerâmicas, porcelanatos, azulejos.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Ferramentas: manuais e elétricas para construção e reforma.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Madeiras: tábuas, caibros, portas, batentes.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Atendimento técnico e Consultoria para sua obra.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-600 mr-2">•</span>
                                <span>Entrega rápida e segura até o seu endereço.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Box - Login Form -->
            <div class="lg:w-1/2 bg-gray-50 p-8 lg:p-12 flex flex-col justify-center">
                <div class="max-w-md mx-auto w-full">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="e-mail"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('email') border-red-500 @enderror"
                                >
                                @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Password
                                </label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Senha"
                                    required
                                    autocomplete="current-password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('password') border-red-500 @enderror"
                                >
                                @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center">
                                <input
                                    id="remember"
                                    name="remember"
                                    type="checkbox"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                >
                                <label for="remember" class="ml-2 block text-sm text-gray-900">
                                    Lembrar de mim
                                </label>
                            </div>

                            <!-- Login Button -->
                            <div>
                                <button
                                    type="submit"
                                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 transform hover:scale-[1.02]"
                                >
                                    Login
                                </button>
                            </div>

                            <!-- Forgot Password Link -->
                            <div class="text-center">
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm text-blue-600 hover:text-blue-700 hover:underline transition-colors duration-200"
                                >
                                    Esqueceu a senha?
                                </a>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-sm text-gray-600">
                                    Deseja ter uma conta?
                                    <a
                                        href="{{ route('register') }}"
                                        class="text-blue-600 hover:text-blue-700 hover:underline font-medium transition-colors duration-200"
                                    >
                                        Solicite Cadastro
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="flex justify-center space-x-8">
                    <a
                        href="{{ route('terms') }}"
                        class="text-sm text-gray-600 hover:text-gray-900 hover:underline transition-colors duration-200"
                    >
                        Termos
                    </a>
                    <a
                        href="{{ route('contracts') }}"
                        class="text-sm text-gray-600 hover:text-gray-900 hover:underline transition-colors duration-200"
                    >
                        Contratos
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        class="text-sm text-gray-600 hover:text-gray-900 hover:underline transition-colors duration-200"
                    >
                        Fale Conosco
                    </a>
                </div>
            </div>
        </footer>
    </div>
@endsection
