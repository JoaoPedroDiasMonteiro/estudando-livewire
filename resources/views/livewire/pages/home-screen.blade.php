<div x-data="{showContact: false}">
    {{-- Hero --}}
    <section class="bg-brand-main text-white">
        <div class="pt-11 mb-6 px-4 container mx-auto flex items-center">
            <div class="inline-block"><img src="/images/logo_white.svg" alt="Feedbacker" /></div>

            <div class="items-center hidden md:inline-flex ml-auto">
                <button @click="alert(1)" class="font-bold text-xl mr-11">Crie uma conta</button>
                <x-buttons.white>Entrar</x-buttons.white>
            </div>

            {{-- Mobile Menu --}}
            <div x-data="{showMenu : false}" class="items-center inline-flex ml-auto relative md:hidden">
                <svg x-show="!showMenu" @click="showMenu = !showMenu" xmlns="http://www.w3.org/2000/svg"
                    class="h-10 w-10 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <div x-show="showMenu" @click="showMenu = !showMenu"
                    class="bg-white text-brand-main p-3 rounded-lg absolute top-0 right-0 shadow-md"
                    style="min-width: 200px">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto h-6 w-6 cursor-pointer" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <button @click="createAccount" class="font-bold text-xl">Crie uma conta</button>

                    <button @click="login" class="font-bold text-xl">Entrar</button>
                </div>
            </div>
        </div>

        <div class="flex container justify-evenly mx-auto align-middle items-center px-5 mt-14 pb-14 lg:pb-0">
            <div class="w-full lg:w-1/2">
                <h1 class="font-black text-6xl">Tenha um feedback. E faça seus clientes mais felizes!</h1>
                <h2 class="text-2xl mt-2 font-normal">Receba ideias, reclamações e feedbacks com um simples widget na
                    página.</h2>
                <h3 class="mt-12">
                    <x-buttons.white>Crie uma conta grátis</x-buttons.white>
                </h3>
            </div>
            <div class="hidden md:block lg:w-1/2">
                <img src="/images/balloons.svg" alt="Tenha um feedback. E faça seus clientes mais felizes!" />
            </div>
        </div>
    </section>


    <div x-show="showContact">
        <livewire:components.contact-modal>
    </div>
    {{-- Contact --}}
    <section class="py-14">
        <h1 class="text-center font-black text-5xl">Alguma dúvida?</h1>
        <h2 class="text-center text-2xl mt-4 text-gray-600">Quer saber melhor como funciona e quais são os preços?</h2>
        <h3 class="text-center mt-8"
            @click="() => {showContact = true; document.querySelector('body').classList.add('overflow-hidden')}">
            <x-buttons.brand>Entre em contato</x-buttons.brand>
        </h3>
    </section>
</div>
