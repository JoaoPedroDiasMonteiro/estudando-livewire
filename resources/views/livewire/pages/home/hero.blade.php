<section class="bg-brand-main text-white">
    <div class="pt-11 mb-6 px-4 container mx-auto flex items-center">
        <div class="inline-block"><img src="/images/logo_white.svg" alt="Feedbacker" /></div>

        <div class="items-center hidden md:inline-flex ml-auto">
            @auth
                <a href="{{ route('dashboard') }}">
                    <x-buttons.white>Minha Conta</x-buttons.white>
                </a>
            @else
                <button class="font-bold text-xl mr-11"
                    @click="() => {showCreateAccount = true; document.querySelector('body').classList.add('overflow-hidden')}">
                    Crie uma conta
                </button>
                <x-buttons.white>Entrar</x-buttons.white>
            @endauth

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
                @auth
                    <a href="{{ route('dashboard') }}" class="font-bold text-xl block">Minha Conta</a>
                @else
                    <button class="font-bold text-xl"
                        @click="() => {showCreateAccount = true; document.querySelector('body').classList.add('overflow-hidden')}">
                        Crie uma conta
                    </button>
                    <button @click="login" class="font-bold text-xl">Entrar</button>
                @endauth
            </div>
        </div>
    </div>

    <div class="flex container justify-evenly mx-auto align-middle items-center px-5 mt-14 pb-14 lg:pb-0">
        <div class="w-full lg:w-1/2">
            <h1 class="font-black text-6xl">Tenha um feedback. E faça seus clientes mais felizes!</h1>
            <h2 class="text-2xl mt-2 font-normal">Receba ideias, reclamações e feedbacks com um simples widget na
                página.</h2>
            @auth
                <a href="{{ route('dashboard') }}" class="mt-12 block">
                    <x-buttons.white>Acessar Minha Conta</x-buttons.white>
                </a>
            @else
                <h3 class="mt-12"
                    @click="() => {showCreateAccount = true; document.querySelector('body').classList.add('overflow-hidden')}">
                    <x-buttons.white>Crie uma conta grátis</x-buttons.white>
                </h3>
            @endauth

        </div>
        <div class="hidden md:block lg:w-1/2">
            <img src="/images/balloons.svg" alt="Tenha um feedback. E faça seus clientes mais felizes!" />
        </div>
    </div>
</section>