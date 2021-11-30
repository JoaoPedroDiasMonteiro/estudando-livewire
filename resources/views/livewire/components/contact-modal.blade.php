<div x-show="showContact"
    class="w-full h-screen fixed z-50 top-0 left-0 bg-black bg-opacity-30 p-4 flex items-center justify-center overflow-hidden"
    @click="() => {showContact = false; document.querySelector('body').classList.remove('overflow-hidden')}"
    x-on:contact-added.window="showContact = false">

    <div @click.stop class="border border-gray-100 rounded-md shadow-md bg-white animate__animated animate__fadeInUp animate__faster">

        <form wire:submit.prevent="submit" class="md:w-96 p-6 w-72">
            <h1 class="text-2xl font-bold">Entre em Contato</h1>

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
                    <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input wire:model='phone' type="text" id="phone" autocomplete="phone"
                        class="
                            {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm">
                    @error('phone')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col pb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Mensagem</label>
                    <textarea wire:model='message' type="text" id="name" autocomplete="message" rows="2"
                        class="
                            {{ $errors->has('message') ? 'border-red-500' : 'border-gray-300' }}
                            block w-full p-2 mt-1 border rounded-md shadow-sm focus:outline-none  sm:text-sm"></textarea>
                    @error('message')
                        <span class="text-red-500 text-xs italic absolute bottom-0 left-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4 self-end">
                    <x-buttons.brand>
                        Enviar
                    </x-buttons.brand>
                </div>
            </div>
        </form>
    </div>
</div>
