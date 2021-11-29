<div x-data="{showContact: false, showCreateAccount: false}">
    @include('livewire.pages.home.hero')
    @include('livewire.pages.home.contact')
    
    <div x-show="showCreateAccount">
        <livewire:components.create-account-modal>
    </div>

    <div x-show="showContact">
        <livewire:components.contact-modal>
    </div>    
</div>
