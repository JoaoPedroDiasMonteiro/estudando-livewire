<section class="py-14">
    <h1 class="text-center font-black text-5xl">Alguma dúvida?</h1>
    <h2 class="text-center text-2xl mt-4 text-gray-600">Quer saber melhor como funciona e quais são os preços?</h2>
    <h3 class="text-center mt-8"
        @click="() => {showContact = true; document.querySelector('body').classList.add('overflow-hidden')}">
        <x-buttons.brand>Entre em contato</x-buttons.brand>
    </h3>
</section>