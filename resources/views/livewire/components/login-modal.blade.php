<div class="w-full h-screen fixed z-50 top-0 left-0 bg-black bg-opacity-30 p-4 flex items-center justify-center"
    @click="() => {showLogin = false; document.querySelector('body').classList.remove('overflow-hidden')}">
    <div @click.stop class="border border-gray-100 rounded-md shadow-md bg-white">
        <form wire:submit.prevent="submit" class="md:w-96 p-6 w-72">

            <h1 class="text-2xl font-bold">Acessar Conta</h1>

            @error('auth')
                <span class="text-red-500 text-sm italic">{{ $message }}</span>
            @enderror

            <div class="gap-2 mt-4 flex flex-col">
                <div class="relative flex flex-col pb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Endereço de Email</label>
                    <input wire:model.lazy='email' type="email" id="email" autocomplete="email"
                        class="
                            {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    @error('email')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col pb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input wire:model.lazy='password' type="password" id="password" autocomplete="false"
                        class="
                            {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    @error('password')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4 self-end flex items-center">
                    <span wire:loading.remove>
                        <x-buttons.brand>
                            Entrar
                        </x-buttons.brand>
                    </span>
                    
                    <span wire:loading.block>
                        <x-buttons.brand-loading  />
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
