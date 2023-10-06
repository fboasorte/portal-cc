<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">   <!-- Add o enctype -->
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Currículo Lattes-->
        <div class="mt-4">
            <x-input-label for="curriculo_lattes" :value="__('Currículo Lattes')" />
            <x-text-input id="curriculo_lattes" class="block mt-1 w-full" type="text" name="curriculo_lattes" :value="old('curriculo_lattes')" required autocomplete="curriculo_lattes" />
            <x-input-error :messages="$errors->get('curriculo_lattes')" class="mt-2" />
        </div>

        <!-- Titulação-->
        <div class="mt-4">
            <x-input-label for="titulacao" :value="__('Titulacao')" />
            <x-text-input id="titulacao" class="block mt-1 w-full" type="text" name="titulacao" :value="old('titulacao')" required autocomplete="titulacao" />
            <x-input-error :messages="$errors->get('titulacao')" class="mt-2" />
        </div>

        <!-- Biografia-->
            <div class="mt-4">
            <x-input-label for="biografia" :value="__('Biografia')" />
            <x-text-input id="biografia" class="block mt-1 w-full" type="text" name="biografia" :value="old('biografia')" required autocomplete="biografia" />
            <x-input-error :messages="$errors->get('biografia')" class="mt-2" />
        </div>

        <!-- Area-->
        <div class="mt-4">
            <x-input-label for="area" :value="__('Área')" />
            <x-text-input id="area" class="block mt-1 w-full" type="text" name="area" :value="old('area')" required autocomplete="area" />
            <x-input-error :messages="$errors->get('area')" class="mt-2" />
        </div>

        <!-- Foto-->
        <div class="mt-4">
            <x-input-label for="fotos" :value="__('Foto')" />
            <input type="file" name="fotos[]" id="fotos" class="form-control" multiple>
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já tem conta?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>  

        <!-- <button type="submit" class="btn custom-button btn-default">Cadastrar</button>
        <button class="btn custom-button custom-button-castastrar-tcc btn-default"><a 
            href="{{ route('dashboard') }} "class="btn-back">Cancelar</a></button> -->

    </form>
</x-guest-layout>
