<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action bg-light" href="/home">Home</a>
        @can ('view', App\Hostname::class)
            <a class="list-group-item list-group-item-action bg-light" href="/hostnames">Hostnames</a>
        @endcan
        <a class="list-group-item list-group-item-action bg-light" href="/billing">Billing</a>
        @can ('view', App\Admin::class)
            <a class="list-group-item list-group-item-action bg-light" href="/admin">Admin</a>
        @endcan
    </div>
</div>