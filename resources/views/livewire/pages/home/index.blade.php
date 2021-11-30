<div x-data="{showContact: false, showCreateAccount: false, showLogin: false}">
    @include('livewire.pages.home.hero')
    @include('livewire.pages.home.contact')
    
    <div x-show="showCreateAccount">
        <livewire:components.create-account-modal>
    </div>


    <livewire:components.contact-modal>
  

    <div x-show="showLogin">
        <livewire:components.login-modal>
    </div>    
</div>
