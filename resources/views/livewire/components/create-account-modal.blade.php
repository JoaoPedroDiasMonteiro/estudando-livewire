<div class="w-full h-screen fixed z-50 top-0 left-0 bg-black bg-opacity-30 p-4 flex items-center justify-center"
    @click="() => {showCreateAccount = false; document.querySelector('body').classList.remove('overflow-hidden')}">
    <div @click.stop class="border border-gray-100 rounded-md shadow-md bg-white">
        <form wire:submit.prevent="submit" class="md:w-96 p-6 w-72">
            <h1 class="text-2xl font-bold">Criar uma Conta</h1>


            <div class="gap-2 mt-4 flex flex-col">
                <div class="relative flex flex-col pb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input wire:model="name" type="text" id="name" autocomplete="name"
                        class="
                            {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border  rounded-md shadow-sm focus:outline-none sm:text-sm">
                    @error('name')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col pb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Endereço de Email</label>
                    <input wire:model='email' type="email" id="email" autocomplete="email"
                        class="
                            {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    @error('email')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col pb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input wire:model='password' type="password" id="password" autocomplete="false"
                        class="
                            {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    @error('password')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col pb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmação da
                        senha</label>
                    <input wire:model='password_confirmation' type="password" id="password_confirmation" autocomplete="false"
                        class="
                            {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm" />
                    @error('password_confirmation')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4 self-end">
                    <x-buttons.brand>
                        Cadastrar
                    </x-buttons.brand>
                </div>
            </div>

        </form>
    </div>

</div>
