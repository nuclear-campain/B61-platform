<div class="list-group mb-4">
    <a href="{{ route('account.settings') }}" class="list-group-item list-group-item-action">
        <i class="fe fe-user mr-1"></i> Information
    </a>

    <a href="{{ route('account.settings', ['type' => 'security']) }}" class="list-group-item list-group-item-action">
        <i class="fe fe-shield mr-1"></i> Security
    </a>
</div>

<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action list-group-item-danger">
        <i class="fe fe-x-circle mr-1"></i> Delete your account
    </a>
</div>