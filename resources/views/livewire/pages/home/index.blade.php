<div x-data="{showContact: false, showCreateAccount: false, showLogin: false}">
    @include('livewire.pages.home.hero')
    @include('livewire.pages.home.contact')
    
    <livewire:components.create-account-modal>
    <livewire:components.contact-modal>
    <livewire:components.login-modal>
</div>
